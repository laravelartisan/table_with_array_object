<?php


class Table extends ArrayObject
{
    const DEFAULT_TABLE_SKELETON = [
        'table_open'            => '<table border="0" cellpadding="4" cellspacing="0">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
    ];

    protected $tableSkeleton;
    public $name;
    public $email;
    public $address;

    public function __construct(array $fields = [], $tableSkeleton = self::DEFAULT_TABLE_SKELETON)
    {
        parent::__construct($fields, ArrayObject::ARRAY_AS_PROPS);
        $this->setTableTemplate($tableSkeleton);
    }

    public function setTableTemplate($tableSkeleton)
    {
        if (!is_array($tableSkeleton)) {
            throw new InvalidArgumentException('The specified template file is invalid.');
        }
        $this->tableSkeleton = $tableSkeleton;
    }

   /* public function getTableTemplate()
    {
        return $this->tableSkeleton;
    }*/

    public function resetTableTemplate()
    {
        $this->tableSkeleton = self::DEFAULT_TABLE_SKELETON;
    }

    public function displayAsTable($tHeads)
    {
        $fields = $this->getArrayCopy();
        $name = $this->name = $fields['name'];
        $email = $this->email = $fields['email'];
        $address = $this->address = $fields['address'];
        $tableSkeleton = $this->tableSkeleton;

        $table = $tableSkeleton['table_open']. $tableSkeleton['thead_open']. $tableSkeleton['heading_row_start'];
        $tblHeads = '';
        foreach ($tHeads as $tHead) {
            $tblHeads .= $tableSkeleton['heading_cell_start'].$tHead. $tableSkeleton['heading_cell_end'];
        }

        $table = $table.$tblHeads. $tableSkeleton['heading_row_end']. $tableSkeleton['thead_close']. $tableSkeleton['tbody_open'].$tableSkeleton['row_start'];

        $tblData = '';

        foreach ($fields as $field) {
            $tblData .=  $tableSkeleton['cell_start']. $field. $tableSkeleton['cell_end'];
        }

        $table = $table.$tblData.$tableSkeleton['row_end'].$tableSkeleton['tbody_close']. $tableSkeleton['table_close'];

        return $table;

//         ob_get_clean();
    }
}

$tableObj = new Table([
        'name' => 'Raja',
        'email' => 'raja@email.com',
        'address' => 'dhaka',
    ]
);

echo $tableObj->name;




echo $tableObj->displayAsTable(['Name', 'Email', 'Address']);