<?php
require('helpers/database.php');
$conn = connect();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Meteor's Fall</title>
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <header>
      <div class="header">
        <div class="header-left">
          <img id="header-logo" src="images/logo.jpg" alt="meteor">
          <div class="header-title">
            <div class="">
              <h1>Meteor's Fall</h1>
            </div>
          </div>
        </div>
        <div class="header-right">
          <h2>Search</h2>
          <input id="search" type="text" name="search" value="">
        </div>
      </div>
    </header>
    <main>
      <div class="main">
        <section class="articles">
          <?php
            $result = $conn->query("SELECT * FROM Article ORDER BY date DESC;");
            if (!$result) {
              die(mysqli_error($conn));
            }
            $row = $result->fetch_assoc();
          ?>
          <article class="article">
            <div class="article-header">
              <div class="article-name">
                <h1 id="article-name"><?php echo $row["title"]; ?></h1>
              </div>
              <div class="article-title-info">
                <p class="article-date" id="article-date">
                  <?php echo $row["date"]; ?>
                </p>
                <div class="article-nav">
                  <a href="#">&lt;</a>
                  <a href="#">&gt;</a>
                </div>
              </div>
            </div>
            <div class="article-text" id="article-text">
	      <?php echo $row["content"]; ?> 
	    </div>
          </article>
        </section>
        <aside class="info">
          <button type="button" name="subscribe">Subscribe</button>
          <p>About Me</p>
          <p>Projects</p>
          <ul>
            <li>The Blog and the this and the that</li>
            <li>The RPG</li>
            <li>The Thorn</li>
          </ul>
        </aside>
      </div>
    </main>
  </body>
</html>
