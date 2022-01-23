<table>
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
