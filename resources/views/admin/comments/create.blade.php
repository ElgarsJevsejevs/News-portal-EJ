<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    <label>Virsraksts:</label>
    <input type="text" name="title" required><br>

    <label>Saturs:</label>
    <textarea name="content" required></textarea><br>

    <label>Pielikums (jpg/png/pdf, max 2MB):</label>
    <input type="file" name="attachment"><br>

    <button type="submit">Saglabāt</button>
</form>
