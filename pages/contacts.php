<h1>Contacts</h1>

<form action="index.php" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name:</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="mb-3">
        <label class="form-label">Phone:</label>
        <input type="text" class="form-control" name="phone">
    </div>

    <div class="mb-3">
        <label class="form-label">Message:</label>
        <textarea type="text" class="form-control" name="message"> </textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="action" value="sendEmail">Submit</button>
</form>