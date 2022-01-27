<style>
    @page {
  header: page-header;
  footer: page-footer;
}
.pdf{
    margin-top: 50px;
}
.pdf th, td {
    border-bottom: 1px solid #000;
    text-align: center;
}

.pdf tr:nth-child(even) {
    background-color: #fff2cd;
}

.header{
    margin-bottom: 50px;
}
</style>


<htmlpageheader class="header" name="page-header">
    <h1>Our Portfolios</h1>
</htmlpageheader>


<table class="pdf" width="100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Name EN</th>
        <th>Name AR</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($portfolios as $portfolio)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $portfolio->getTranslation('name','en')}}</td>
            <td>{{ $portfolio->getTranslation('name','ar')}}</td>
            <td>{{ $portfolio->description }}</td>
        </tr>
    @endforeach
    </tbody>
</table>


  <htmlpagefooter name="page-footer">
    Your Footer Content
  </htmlpagefooter>
