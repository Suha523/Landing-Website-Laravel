<style>
    @page {
  header: page-header;
  footer: page-footer;
}
</style>


<htmlpageheader name="page-header">
    Your Header Content
  </htmlpageheader>


<table border="1">
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
