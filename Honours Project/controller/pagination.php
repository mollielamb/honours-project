<?php
session_start();

?>

<style>
.pagination {
  display: inline-block;
   margin-left: auto;
    margin-right: auto;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: <?php echo $_SESSION['border']; ?>;
  color: white;
  border: 1px solid black;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

</style>

<?php
class paginate_1
{
     private $db;
     function __construct($conn)
     {
         $this->db = $conn;
     }
     public function dataview($query)
     {
         $stmt = $this->db->prepare($query);
         $stmt->execute();
 
         if($stmt->rowCount()>0)
         {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                   ?>
                   <div class="container">
				   
  <div class="card mt-5">
    <div class="card-header" style="font-size: <?php echo $_SESSION['size']; ?>px; background-color: <?php echo $_SESSION['border']; ?>;color:#FFFFFF;"><strong><?php echo $row['question'];?></strong>
	</div>
    
	
	<div class="card-body"> 
	<p style="font-size:<?php echo $_SESSION['size']; ?>px;">Asked by: <?php echo $row['poster'];?></p>
	<?php echo '<a class="btn btn-success" href="answer.php?question_id='.$row['id'].'">Answer Question</a>'; ?>
	<p>To show the current answers to this question press the button</p>
  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapse_<?php echo $row['id']; ?>">View Answers</button>
  <div id="collapse_<?php echo $row['id']; ?>" name="<?php echo $row['id']; ?>" class="collapse">
     
	 <?php 
	 
		 $query1 = "SELECT q.id, q.question, q.poster, a.id, a.question_id, a.answer, a.answered_by
      FROM questions q INNER JOIN answers a ON q.id = a.question_id where a.question_id= {$row['id']}";
	  
	  $stmt1 = $this->db->prepare($query1);
         $stmt1->execute();
		 
         if($stmt1->rowCount()>0)
         {
                while($row=$stmt1->fetch(PDO::FETCH_ASSOC))
                {
				echo '<p>Answer: ';
				echo $row['answer'];
				echo '. Answered by: ';
				echo $row['answered_by'];
				echo "</p></br>";
				}
		 } else {
			 echo "There are no answers to this question yet";
		 }
		?>
  </div>
  </div>
</div>
</div>
                   <?php
                }
         }
         else
         {
                ?>
                <tr>
                <td>No questions have been asked yet</td>
                </tr>
                <?php
         }
 }
 public function paging($query,$data_per_Page)
 {
        $starting_position=0;
        if(isset($_GET["page_no"]))
        {
             $starting_position=($_GET["page_no"]-1)*$data_per_Page;
        }
        $query2=$query." limit $starting_position,$data_per_Page";
        return $query2;
 }
 public function paginglink($query,$data_per_Page)
 {
        $self = $_SERVER['PHP_SELF'];
  
        $stmt = $this->db->prepare($query);
        $stmt->execute();
  
        $total_no_of_records = $stmt->rowCount();
		?> 
		<div class='pagination'>
		<?php 
        if($total_no_of_records > 0)
        {
            ?><tr><td colspan="3"><?php
            $whole_count_Of_Pages=ceil($total_no_of_records/$data_per_Page);
            $current_page=1;
            if(isset($_GET["page_no"]))
            {
               $current_page=$_GET["page_no"];
            }
            if($current_page!=1)
            {
               $previous =$current_page-1;
               echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
               echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
            }
            for($i=1;$i<=$whole_count_Of_Pages;$i++)
            {
            if($i==$current_page)
            {
                echo "<strong><a href='".$self."?page_no=".$i."' class='active'>".$i."</a></strong>&nbsp;&nbsp;";
            }
            else
            {
                echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
            }
   }
   if($current_page!=$whole_count_Of_Pages)
   {
        $next=$current_page+1;
        echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
        echo "<a href='".$self."?page_no=".$whole_count_Of_Pages."'>Last</a>&nbsp;&nbsp;";
   }
   ?></td></tr></div><?php
  }
 }
}