<style>
     @page {
  header: page-header;
  footer: page-footer;
     }
    .pdf th, td {
    border-bottom: 1px solid #000;
    text-align: center;
}

.pdf tr:nth-child(even) {
    background-color: #fff2cd;
}

</style>

<htmlpageheader name="page-header">
    <h1>Users</h1>
</htmlpageheader>

<table class="pdf" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>

        @endforeach
    </tbody>


</table>

<htmlpagefooter name="page-footer">
    Your Footer Content
</htmlpagefooter>
