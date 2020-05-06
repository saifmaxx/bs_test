<?php 


require_once('db.php');

Class Oopclass{
	
    function select_category() {
        $Dbobj = new Dbconnection(); 
		
		$sql = "SELECT c.Name,SUM(DISTINCT i.Stock) ttl 
												FROM item_category_relations ci 
												JOIN category c ON c.Id = ci.categoryId 
												JOIN item i ON ci.ItemNumber = i.Number 
												GROUP BY c.ID ORDER BY ttl DESC";
        $query = mysqli_query($Dbobj->getdbconnect(), $sql);
		$data = array();
		while($row_data = mysqli_fetch_object($query))
		{
		  $data[] = $row_data;
		}
        return $data;
    }
	
	
	function select_parent_category() {
        $Dbobj = new Dbconnection(); 
		
		$sql = "SELECT c.Id, c.Name FROM category c LEFT JOIN catetory_relations cr ON c.Id = cr.categoryId WHERE cr.categoryId IS NULL ";
        $query = mysqli_query($Dbobj->getdbconnect(), $sql);
		$data = array();
		while($row_data = mysqli_fetch_object($query))
		{
		  $data[] = $row_data;
		}
        return $data;
    }
	
	
	function display_children($parent_id, $level) {
        $Dbobj = new Dbconnection();
        
        $sql = "SELECT  c.Id, c.Name, m.categoryId, m.ParentcategoryId, x.count_row 
		FROM catetory_relations m
		JOIN category c ON c.Id = m.categoryId
		LEFT OUTER JOIN (SELECT ParentcategoryId, COUNT(*) AS count_row FROM catetory_relations GROUP BY ParentcategoryId) x ON c.Id = x.ParentcategoryId 
		WHERE m.ParentcategoryId = $parent_id ";

		$query = mysqli_query($Dbobj->getdbconnect(), $sql);
		$result = array();
		while($row_data = mysqli_fetch_object($query))
		{
		  $result[] = $row_data;
		}
		
		

        $html = "<ul>";
        if (!empty($result)) {
            foreach ($result as $row) {
                 /*echo '<pre>';
                  print_r($row);
                  //exit; */
                if ($row->count_row > 0) {
                    $html .= '<li><span>&nbsp; ' . $row->Name .'-'.$row->count_row. '</span>';
                    $html .=  $this->display_children($row->categoryId, $level + 1);
                    $html .= "</li>";
                } else {
                    $html .= '<li><span>&nbsp;' . $row->Name .'-'.$row->count_row. '</span>';
                    $html .= "</li>";
                }
            }
        }
        $html .= "</ul>";
		
		return $html;
    }
	
	
	
}


/*
class Oopclass {
	
	function select_category(){
		$sql = "SELECT Id, Name FROM catgory";
		$result = $conn->query($sql);
		return $result;
	}
}
*/


?>