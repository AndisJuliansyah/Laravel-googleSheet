<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class GoogleServices
{
    public function __construct() {
        $this->googleClient = new \Google_Client();
        $this->googleClient->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $this->googleClient->setAccessType('offline');
        $this->googleClient->setAuthConfig(Storage::path('/credential.json'));
        $this->googleSheet = new \Google_Service_Sheets($this->googleClient);
    }


   public function get($spreadsheetId, $sheet_name, $column_start, $column_end, $row_start) {
        $range =  $sheet_name.'!'.$column_start.$row_start.':'.$column_end;
        $googleResponse =  $this->googleSheet->spreadsheets_values->get($spreadsheetId, $range);
        $data = $googleResponse->getValues();

        foreach($data as $index => $value) {
            $current_row = $row_start + $index;
            $data[$index]['rangeStart'] = $column_start . $current_row;
            $data[$index]['rangeEnd'] = $column_end. $current_row; 
            $data[$index]['rowIndex'] = $current_row - 1;
        }

        return $data;
   }


   public function update($spreadsheetId, $range, $values) {
        $setValues = new \Google_Service_Sheets_ValueRange(['values' => $values]);
        $params = [ 'valueInputOption' => 'RAW'];
        return $this->googleSheet->spreadsheets_values->update($spreadsheetId, $range, $setValues, $params);
   }

   public function delete($spreadsheetId, $sheet_id, $row_index) {
        $deleteRequest = new \Google_Service_Sheets_BatchUpdateSpreadsheetRequest(array(
            'requests' => array(
            'deleteDimension' => array(
                'range' => array(
                    'sheetId' => $sheet_id, 
                    'dimension' => "ROWS",
                    'startIndex' => $row_index,
                    'endIndex' => $row_index + 1
                )
            )    
            )
        ));

        return $this->googleSheet->spreadsheets->batchUpdate($spreadsheetId, $deleteRequest);
   }
}