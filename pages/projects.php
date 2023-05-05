<?php include "../layouts/header.php"; 
include "../config/functions.php";

      $sql = "SELECT id,projectimg,projectcount,projectname,description FROM projects";
    $query = mysqli_query($connection, $sql);  


/*       $user = select('projects',['id,projectcount,projectname,description'],);
      var_dump( $user);  */
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
            <p style="float:right;"><a href="../actions/logout.php">Logout</a></p>
        </div>


    </div>
    <div class="projects-container">
    <?php foreach($query as $q){ ?>
        <article class="project">
            <div class="projectSlide">
                <div class="project-image">
                    <img src=../images/<?php echo  $q['projectimg'];?> name="projectimg" />
                </div>
                <div class="project-text">
                </div>
                <div class="project_description">
                <h3 name="projectcount"><?php echo $q['projectcount'];?></h3>
                <p name="projectname"><?php echo $q['projectname'];?></p>
                <b name="description">Skills: <?php echo $q['description'];?></b>
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

        <article class="project">
            <div class="project-image">
                <div class="projectSlide">

                    <img src="<?php echo BASE_URL; ?>images/5-notes.jpeg" />
                </div>
                <div class="project-text">
                    <h3>Projects3</h3>
                    <p>Notes</p>

                    <b> Skills:"Html,CSS,React"</b>
                </div>
            </div>
        </article>

        <article class="project">
            <div class="project-image">
                <div class="projectSlide">

                    <img src="<?php echo BASE_URL; ?>images/4-burger.jpeg" />
                </div>
                <div class="project-text">
                    <h3>Projects3</h3>
                    <p>Notes</p>

                    <b> Skills:"Html,CSS,React"</b>
                </div>
            </div>
        </article>

        <article class="project">
            <div class="project-image">
                <div class="projectSlide">

                    <img src="<?php echo BASE_URL; ?>images/5-notes.jpeg" />
                </div>
                <div class="project-text">
                    <h3>Projects3</h3>
                    <p>Notes</p>

                    <b> Skills:"Html,CSS,React"</b>
                </div>
            </div>
        </article>

        <article class="project">
            <div class="project-image">
                <div class="projectSlide">

                    <img src="<?php echo BASE_URL; ?>images/5-notes.jpeg" />
                </div>
                <div class="project-text">
                    <h3>Projects3</h3>
                    <p>Notes</p>

                    <b> Skills:"Html,CSS,React"</b>
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