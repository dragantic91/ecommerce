<style type="text/css">
    table td, table th {
        padding: 7px;
        border:1px solid black;
    }
</style>
<div class="container">
    <h2>Newsletter</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Title</th>
        </tr>
        @foreach ($subscribers as $key => $item)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $item->email }}</td>
            </tr>
        @endforeach
    </table>
</div>