<?php echo view('header_view');?>
<body>
    <form action="/first/save" method="post">
        <input type="text" name="name" placeholder="Input Name">
        <input type="text" name="phone" placeholder="Input Phone Number">
        <input type="text" name="address" placeholder="Input Adress">
        <button type="submit">Save</button>
    </form>
</body>
</html>