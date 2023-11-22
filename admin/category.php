<?php include "header.php";
include '../db_helper.php';
if (isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
?>
<div class="container">
    <a href="/admin/add_category.php" class="btn btn-success"> Qo'shish</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Kategoriya nomi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (getCategoryList($page) as $item){
            echo "<tr>";
            echo "<td>".$item['id']."</td>";
            echo "<td>".$item['title']."</td>";
            echo "</tr>";
        }?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php  for($page=1; $page<=getPagination();$page++): ?>
                <li class="page-item"><a class="page-link" href="/admin/category.php?page=<?=$page?>"><?=$page?></a></li>
            <?php endfor;?>

            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
