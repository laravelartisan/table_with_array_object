<?php


class Table extends ArrayObject
{
    public $_name;
    public $_email;
    public $_address;

    public function __construct(array $fields = [])
    {
        parent::__construct($this, ArrayObject::ARRAY_AS_PROPS);
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

    $tableObj = new Table();

$tableObj->_name = 'Raja';
$tableObj->_email = 'Raja@email.com';
$tableObj->_address = 'Raja Address';

var_dump($tableObj['_name']);
var_dump($tableObj->_name);


echo $tableWithData = $tableObj->displayAsTable();



