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

    public function __construct(array $fields = array(), $tableSkeleton = self::DEFAULT_TABLE_SKELETON)
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

    public function getTableTemplate()
    {
        return $this->tableSkeleton;
    }

    public function resetTableTemplate()
    {
        $this->tableSkeleton = self::DEFAULT_TABLE_SKELETON;
    }

    public function displayAsTable()
    {
        $fields = $this->getArrayCopy();
        extract($fields);
       //create table here with data//
        return ob_get_clean();
    }
}