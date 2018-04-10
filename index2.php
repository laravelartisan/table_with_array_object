<?php


class Table extends ArrayObject
{
    public $_name;
    public $_email;
    public $_address;

    public function __construct(array $fields = [])
    {
        parent::__construct($this);
        $this->_name = $fields['name'];
        $this->_email = $fields['email'];
        $this->_address = $fields['address'];
        $this->fields = $fields;
    }

    public function displayAsTable()
    {
        return
        "<table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$this->_name</td>
                    <td>$this->_email</td>
                    <td>$this->_address</td>
                </tr>
            </tbody>
        </table>";
    }

}

    $tableObj = new Table([
        'name' => 'Raja',
        'email' => 'raja@email.com',
        'address' => 'dhaka',
    ]
);

//var_dump($tableObj);


$tableWithData = $tableObj->displayAsTable();

echo $tableWithData;

