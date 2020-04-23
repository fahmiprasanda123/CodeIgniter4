<?php echo view('header_view');?>
<body>
    <form action="/first/update" method="post">
        <input type="hidden" name="id" value="<?php echo $data->id;?>">
        <input type="text" name="name" value="<?php echo $data->name;?>">
        <input type="text" name="phone" value="<?php echo $data->phone;?>">
        <input type="text" name="address" value="<?php echo $data->address;?>">
        <button type="submit">Update</button>
    </form>
</body>
</html>