<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="/Mon_compte/Annonces/<?= $num_page['prev']; ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
        </li><?
        $i = 1;
        while($i <= $nb_page)
        {?>
            <li class="<?=($i == $num_page['active'])?'active':''; ?>"><a  href="/Mon_compte/Annonces/<?= $i; ?>"><?= $i; ?></a></li><?
            $i++;
        }?>
        <li>
            <a href="/Mon_compte/Annonces/<?= $num_page['next']; ?>" style="background-color: #E5E5E5;"  aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
        </li>
    </ul>
</nav>