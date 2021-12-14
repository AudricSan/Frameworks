<?php
interface interfaceDAO{
    public function createObject ($result);
    public function fetch ($search, $id);
    public function fetchAll ();
    public function delete ($id);
    public function insert ($data);
    public function update ($id, $data);
}