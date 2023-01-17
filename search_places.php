<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
  ?>
<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Completed Bookings</h2>
					    <table id="table">
                <caption></caption>
						<thead>
						  <tr>
						  <th>Booking No.</th>
							<th>Name</th>
							<th >Pacakge Type</th>
							<th>Washing Point </th>
							<th>Washing Date/Time </th>
							<th >Posting date </th>
							<th>Action </th>
							
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT *,tblcarwashbooking.id as bid from tblcarwashbooking
join tblwashingpoints on tblwashingpoints.id=tblcarwashbooking.carWashPoint
 where status='Completed'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td><?php echo htmlentities($result->bookingId);?></td>
							<td><?php echo htmlentities($result->fullName);?></td>
							<td>
								<?php $ptype=$result->packageType;
if($ptype==1): echo "BASIC CLEANING ($10.99)";endif;
if($ptype==2): echo "PREMIUM CLEANING ($20.99)";endif;
if($ptype==3): echo "COMPLEX CLEANING ($30.99)";endif;


							?></td>
							
						
							<td><?php echo htmlentities($result->washingPointName	);?><br />
								<?php echo htmlentities($result->washingPointAddress);?></td>
							<td><?php echo htmlentities($result->washDate."/".$result->washTime);?></td>
							
								<td><?php echo htmlentities($result->postingDate);?></td>
				

<td><a href="booking-details.php?bid=<?php echo htmlentities($result->bid);?>&&bookingid=<?php echo htmlentities($result->bookingId);?>">View</a>
</td>
<?php } ?>
</tr>
						 <?php } else { ?>
						 	<tr>
						 		<td colspan="6" style="color:red;">No Record found</td>

						 	</tr>
						 <?php } ?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>