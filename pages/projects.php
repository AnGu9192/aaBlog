<?php include "../layouts/header.php"; 
include "../config/functions.php";
$pageSize = 3;
$projects = paginate('projects',['status'=>'active'],'*', $pageSize);
$allProjects = select('projects',['status'=>'active'],'*');
$totalPages = ceil(count($allProjects)/$pageSize);
?>

<section class="projects sec-width" id="projects">
    <div class="title">
        <h2>projects</h2>
    </div>
    <div>

    </div>
    <div class="projects-container">
    <?php foreach($projects as $project){ ?>
        <article class="project">

                <div class="project-image">
                   <img src="<?php echo BASE_URL; ?>uploads/<?php echo $project['image'];?>" name="image" id="image"/>
                </div>
                <div class="project-text">
                    <h3> <a href="<?php echo BASE_URL; ?>pages/projectName.php?id=<?php echo $project['id'];?>">Projects2</a></h3>
                    <p><?php echo $project['title'];?></p>
                    <b> Skills:<?php echo $project['description'];?></b>
                </div>
        </article>
        
        <?php } ?>




    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for($page = 1; $page <= $totalPages; $page++){ ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page ?>"><?php echo $page ?></a>
                </li>
            <?php } ?>
        </ul>
        </nav>

</section>

<?php include "../layouts/footer.php"; ?>