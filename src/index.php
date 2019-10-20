<?php

class Table extends ArrayObject {
  /**
   * [displayAsTable description]
   * @return [type] [description]
   */
  public function displayAsTable() {
    return $this->arrayToTableData;  
  }
  /**
   * [method to check array is multi-dimensional or not]
   * @param  [array]  $arr 
   * @return boolean  
   */
  private function isMulti($arr){
  	return count(array_filter($arr,'is_array')) >0 ? true : false;
  }
  /**
   * [convert array into html table]
   * @return [string] [description]
   */
  private function arrayToTableData(){
    $tableData=$this->getArrayCopy();
    $data="";
      if($this->isMulti($tableData)){
        foreach ($tableData as $key => $value) {
        $data.="<tr>";
        foreach ($value as $key => $val) {
        $data.="<td>$val</td>";
        }
        $data.="</tr>";
        }
      }else{
      $data="<tr>";
      foreach($tableData as $value){
      $data.="<td>$value</td>";
      }
      $data.="</tr>";
      }
      return "<table>
      <tbody>"
      .$data.
      "</tbody>
      </table>";
  }

}

$table = new Table;
$table->append(["name"=>"john","occupation" => "Enginner", "age" => 27]);
$table->append(["name"=>"jane","occupation" => "Doctor", "age" => 28]);
echo $table->displayAsTable();

?>