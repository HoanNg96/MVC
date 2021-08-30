<h1>Sinh Vien</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <a href="/MVC/Sinhvien/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add Sinh Vien</a>
            <tr>
                <th>Ten</th>
                <th>Tuoi</th>
                <th>Diachi</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($sinhvien as $sv) {
            $sv = $sv->get();
            echo '<tr>';
            echo "<td>" . $sv['ten'] . "</td>";
            echo "<td>" . $sv['tuoi'] . "</td>";
            echo "<td>" . $sv['diachi'] . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC/Sinhvien/edit/" . $sv["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC/Sinhvien/delete/" . $sv["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>