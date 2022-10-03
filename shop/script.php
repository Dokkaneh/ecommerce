<?php 
require_once '../dbConnection.php';


if(isset($_GET["page"]))
{
	$data = array();

	$limit = 8; /// display 8 product on the web page

	$page = 1;

	if($_GET["page"] > 1)
	{
		$start = (($_GET["page"] - 1) * $limit); //which rrows tobe fetched

		$page = $_GET["page"];
	}
	else
	{
		$start = 0;
	}

$sql="SELECT name, price, image
FROM products
ORDER BY id ASC";
$filter_query=$sql.'LIMIT'.$start.','.$limit.'';

$stmt=$conn->query($sql);
$stmt->execute();
$total_data=$stmt->rowCount();//returns number of rows affected by last query

$result=$conn->query($filter_query);

foreach ($result as $row) {
    $image_array = explode(" ~ ", $row["images"]);

    $data[] = array(
        'name'		=>	$row['name'],
        'price'		=>	$row['price'],
        'image'		=>	$image_array[0]
    );
}
$pagination_html = '
<nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
';

$total_links = ceil($total_data/$limit);//calc total number of pagination links

$previous_link = '';//previous page

$next_link = '';// next page

$page_link = ''; //current page

$page_array = '';// total

if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;//store page numbers
			}

			$page_array[] = '...'; //after page number store these dotes

			$page_array[] = $total_links;// the last page which appears like this 1,2,3,4,...,20
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
// pagination link for the active page
			$page_link .= '
				<li class="page-item active">
		      		<a class="page-link" href="#">'.$page_array[$count].'</a>
		    	</li>
			';
// display page number
			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
                //make prev page clickable link
				$previous_link = '<li class="page-item"><a class="page-link"
                 href="javascript:load_product('.$previous_id.', `'.$search_query.'`)">Previous</a></li>';
			}
			else
			{
				$previous_link = '
					<li class="page-item disabled">
				        <a class="page-link" href="#">Previous</a>
				    </li>
				';
			}
// for next page number
			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
					<li class="page-item disabled">
		        		<a class="page-link" href="#">Next</a>
		      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" 
                href="javascript:load_product('.$next_id.', `'.$search_query.'`)">Next</a></li>
				';
			}
		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
					<li class="page-item disabled">
		          		<a class="page-link" href="#">...</a>
		      		</li>
				';
			}
			else
			{
				$page_link .= '
					<li class="page-item">
						<a class="page-link"
                         href="javascript:load_product('.$page_array[$count].', `'.$search_query.'`)">'.$page_array[$count].'</a>
					</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</nav>
	';

	$output = array(
		'data'		=>	$data,
		'pagination'=>	$pagination_html,
		'total_data'=>	$total_data
	);

	echo json_encode($output);

}



?>