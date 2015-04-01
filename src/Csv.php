<?php namespace Niiyz\CSV;

use Response;

class CsvDownload
{
    /**
     * Csv Data
     * @var string
     */
    protected $csv = '';

    /**
     * Construct Csv
     * @param array $list
     * @param array $header
     * @return CSV
     */
    public function __construct(Array $list, Array $header = [])
    {
        if (count($header) > 0) {
            array_unshift($list, $header);
        }
        $stream = fopen('php://temp', 'r+b');
        foreach ($list as $row) {
            fputcsv($stream, $row);
        }
        rewind($stream);
        $this->csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
    }

    /**
     * Convert String Encoding
     * @param string $from
     * @param string $to
     * @return void
     */    
    public function convertEncoding($from='UTF-8', $to='SJIS-win')
    {
        $this->csv = mb_convert_encoding($this->csv, $to, $from);
    }

    /**
     * Download CSV
     * @param string $filename
     * @return \Illuminate\Http\Response
     */
    public function download($filename="")
    {
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        );
        return \Response::make($this->csv, 200, $headers);
    }
}