<?php echo view('header_view'); ?>
<body>
    <a href='/first/add_new'><button>Add Data</button></a>
    <table border='1'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $row){?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><a href="/first/edit/<?php echo $row['id'];?>">Edit</a> || <a href="/first/delete/<?php echo $row['id'];?>">Delete</a> </td>
               
            </tr>
        <?php }; ?>
        </tbody>
    </table>
</body>
</html>