<!-- Page à inclure dans les autres pages pour afficher les articles/posts extraits de la base de donnée -->
<article>
    <h3>
        <?php
        $date = $post['created'];
        $newDate = date("d/m/Y H:i:s", strtotime($date));
        ?>
        <time datetime='<?php echo $post['created']?>' ><?php  echo $newDate ?> </time>
    </h3>
    <address><a href="wall.php?user_id=<?php echo $post['user_id']; ?>"><?php echo $post['author_name'] ?></a></address>
    <div>
        <p><?php echo $post['content'] ?></p>
    </div>
    <footer>
        <small>♥ <?php echo $post['like_number'] ?></small>                           
        <?php $tags = explode(',', $post['taglist']);
        foreach ($tags as $tag): ?>
        <a href="">#<?php echo $tag; ?></a>,      
        <?php endforeach;
        unset($tags);
            ?>

    </footer>
</article>