<div>
  <div>{{ get_the_title() }}</div>
  <div>{{ get_field('type') }}</div>
  <div>
    <h2>Horaire</h2>
    <table>
      @foreach($days as $day)
        <tr>
          <th>{{ $day->name }}</th>
          <td>{{ $day->hours }}</td>
        </tr>
      @endforeach
    </table>
  </div>
</div>
