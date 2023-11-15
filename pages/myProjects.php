<?php global $userId;
include "../layouts/header.php";
$pageSize = 3;
$projects = paginate('projects',['status'=>'active','user_id' => $userId],$pageSize);
$project = selectOne('projects',['status'=>'active','user_id' => $userId]);
$totalPages = ceil(count($project)/$pageSize);
?>

<section class="projects sec-width" id="projects">
    <div class="title">
        <h2>projects</h2>
    </div>
    <div>
        <div>
            <?php if ($userId) { ?>
                <a class="btnCreateProject" href="<?php echo BASE_URL; ?>pages/insertProject.php">Create Project</a>
                <p style="float:right;" class="logout"><a href="../actions/logout.php">Logout</a></p>
            <?php } ?>
        </div>
    </div>
    <div class="projects-container">
    <?php foreach($projects as $project){ ?>
        <article class="project">

                <div class="project-image">
                  <img src="<?php echo BASE_URL; ?>uploads/<?php echo $project['image'];?>" name="image" id="image"/>
                </div>
                <div class="project-text">
                    <h3 class="d-flex">Projects
                        </h3>
                    <p><?php echo $project['title'];?></p>
                    <b> Skills:<?php echo $project['description'];?></b>
                </div>
                     <a class="btnCreateProject" href="<?php echo BASE_URL; ?>pages/updateProject.php?id=<?=$project['id']?>">Update Project</a>
                     <a class="btnCreateProject" href="<?php echo BASE_URL; ?>actions/deleteProjectAction.php?id=<?=$project['id']?>"   onclick="return checkDelete()">Delete Project</a>
        </article>

        <?php } ?>




    </div>
    <nav aria-label="Page navigation example p-5">
        <ul class="pagination justify-content-center">
            <?php for($page = 1; $page <= $totalPages; $page++){ ?>
                <li class="page-item p-1 rounded-circle ">
                    <a class="page-link" href="?page=<?php echo $page ?>"><?php echo $page ?></a>
                </li>
            <?php } ?>
        </ul>
        </nav>

</section>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<?php include "../layouts/footer.php"; ?>