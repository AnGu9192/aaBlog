<?php include "../layouts/header.php"; 
include "../config/functions.php";

$projects = select('projects',['status'=>'active']);
var_dump($projects);

?>

<section class="projects sec-width" id="projects">
    <div class="title">
        <h2>projects</h2>
    </div>
    <div>
        <div>
            <?php if ($userId) { ?>
                <a class="btnCreateProject" href="<?php echo BASE_URL; ?>pages/insertProject.php">Create Project</a>
            <?php } ?>
            <p style="float:right;" class="logaout"><a href="../actions/logout.php">Logout</a></p>
        </div>


    </div>
    <div class="projects-container">
    <?php foreach($projects as $project){ ?>
        <article class="project">
            <div class="projectSlide">
                <div class="project-image">
                   <img src="<?php echo BASE_URL; ?>uploads/<?php echo $project['image'];?>" name="image" id="image"/>
                </div>
                <div class="project-text">
                    <h3> <a href="<?php echo BASE_URL; ?>pages/projectName.php?id=<?php echo $project['id'];?>">Projects2</a></h3>
                    <p><?php echo $project['title'];?></p>
                    <b> Skills:<?php echo $project['description'];?></b>
                </div>
            </div>
        </article>
        
        <?php }?>

      <!--   <article class="project">
            <div class="projectSlide">

                <div class="project-image">
                    <img src="<?php echo BASE_URL; ?>images/2-oooarpi.jpeg" />
                </div>
                <div class="project-text">
                    <h3>Projects2</h3>
                    <p>OOO"Arpi" office</p>
                    <b> Skills:"Html,CSS,JavaScript"</b>
                </div>
            </div>
        </article>



 -->


    </div>
    <div class="pagination">

        <div class="page">0<span class="page-num"></span>|10</div>
        <div class="img-slide-arrow">
            <img src="../images/arrow-left.png" alt="arrow-left" class="img-slide-arrow1 prev">
            <img src="../images/arrow-right.png" alt="arrow-right" class="img-slide-arrow2 next">
        </div>
    </div>
</section>

<?php include "../layouts/footer.php"; ?>