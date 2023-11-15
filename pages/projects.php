<?php include "../layouts/header.php";

$userId = $_SESSION["USER_ID"];

$pageSize = 3;
$projects = paginate('projects',['status'=>'active'],$pageSize);
$project = selectOne('projects',['status'=>'active','user_id' => $userId]);

$totalPages = ceil(count($project)/$pageSize);
?>


<section class="projects sec-width" id="projects">
    <div class="title">
        <h2>projects</h2>
         <input type="search" name="search" id="search" />

    </div>

    <div>

    </div>
    <div class="projects-container">

    <?php foreach($projects as $project){
    $avatar = selectOne('users',['status'=>'new','id' => $project['user_id']], 'avatar');
    ?>
        <article class="project">
                <div class="project-image">
          <a href="<?php echo BASE_URL; ?>pages/projectImage.php?id=<?php echo $project['image'];?>"> <img src="<?php echo BASE_URL; ?>uploads/<?php echo $project['image'];?>" name="image" id="image"/></a>
                </div>
                <div class="project-text">
                    <h3 class="d-flex">Project
                        <img src="<?php echo BASE_URL; ?>uploads/<?php echo $avatar['avatar'];?>" style="width:12%; border-radius: 50%"/>
                    </h3>
                    <p><?php echo $project['title'];?></p>
                    <b> Skills:<?php echo $project['description'];?></b>
                </div>
        </article>

        <?php } ?>


    </div>
    <nav aria-label="Page navigation example  p-5">
        <ul class="pagination justify-content-center">
            <?php for($page = 1; $page <= $totalPages; $page++){ ?>
                <li class="page-item ">
                    <a class="page-link" href="?page=<?php echo $page ?>"><?php echo $page ?></a>
                </li>
            <?php } ?>
        </ul>
        </nav>

</section>

<?php include "../layouts/footer.php"; ?>