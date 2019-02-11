<?php
class Vocabulary
{

    public $URL = "https://docs.google.com/spreadsheets/d/e/2PACX-1vSu_2sKcQHbib9-wubE7Yw2RRo8Dm0d8IVjJDvt-fnrB21FEgNHYvpopWwtBLhfE5_TTCXk38gjtOiE/pub?output=csv";
    public $data = [];
    
    public function __construct()
    {
        //  Read .csv file and store into an array
        if (($handle = fopen($this->URL, "r")) !== FALSE)
        {
            while (($line = fgetcsv($handle)) !== FALSE)
            {
                $this->data[] = $line;
            }
            fclose($handle);
        }
        else
        {
            die("Problem reading csv");
        };

        //  Separate labels from actual data
        $labels = $this->data[0];
        unset($this->data[0]);

        //  Associate the labels with the data
        foreach ($this->data as $rowId => $row)
        {
            foreach ($row as $key => $val)
            {
                $row[$labels[$key]] = $val;
                unset($row[$key]);
            }

            $this->data[$rowId] = $row;
        };

        //  Declare public variables from $data
        $this->length = count($this->data);
    }

    //  Public Methods declaration
    public function display()
    {
        echo '<h1>All Vocabulary:</h1><pre>';
        print_r($this->data);
        echo '</pre>';
    }
    
    public function filter($cat)
    {
        if (!is_array($cat)) {return false;}

        $filtered = array_filter($this->data, function ($val) use ($cat) 
        {
            return in_array(strtolower($val['category']), $cat);
        });

        return array_values($filtered);
    }
};