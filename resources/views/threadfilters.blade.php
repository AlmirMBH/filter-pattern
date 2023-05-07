<!DOCTYPE html>
<html>

<head>
  <title>Get Threads</title>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 80vh;
      gap: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 80%;
      max-width: 500px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
    }

    input,
    select {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #3e8e41;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      max-width: 800px;
      margin-top: 20px;
      margin-left: 15px;
      border-radius: 5px;
      overflow: hidden;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
    }

    th,
    td {
      padding: 16px 8px 16px 8px;
      width: 200px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #4CAF50;
      color: white;
      text-align: center;
    }
  </style>
</head>

<body>

  <div class="container">
    <form action="{{ route('search-thread') }}" method="POST">
      @method('POST')
      @csrf

      <label for="byName">Name:</label>
      <input type="text" id="byName" name="byName" value="{{ old('byName', session('threadFilterInput.byName')) }}">
      @error('byName')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <label for="repliesCount">Replies Count:</label>
      <input type="number" id="repliesCount" name="repliesCount" value="{{ old('repliesCount', session('threadFilterInput.repliesCount')) }}">
      @error('repliesCount')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <label for="threadChannelId">Channel ID:</label>
      <input type="number" id="threadChannelId" name="threadChannelId" value="{{ old('threadChannelId', session('threadFilterInput.threadChannelId')) }}">
      @error('threadChannelId')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror


      <label for="pagination">Number of Records:</label>
      <input type="number" id="pagination" name="pagination" value="{{ old('pagination', session('threadFilterInput.pagination')) }}">
      @error('pagination')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <label for="orderBy">Order By:</label>
      <select id="orderBy" name="orderById">
        <option value="asc" {{ old('orderById', session('threadFilterInput.orderById')) === 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ old('orderById', session('threadFilterInput.orderById')) === 'desc' ? 'selected' : '' }}>Descending</option>
      </select>
      @error('orderById')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <input type="submit" value="Get Threads">
    </form>
  </div>
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Slug</th>
          <th>User ID</th>
          <th>Channel ID</th>
          <th>Replies Count</th>
          <th>Title</th>
          <th>Body</th>
          <th>Best Reply ID</th>
          <th>Locked</th>
        </tr>
      </thead>
      @if (isset($threads) && !$errors->any())
      <tbody>
        @foreach ($threads as $thread)
        <tr>
          <td>{{ $thread->id }}</td>
          <td>{{ $thread->slug }}</td>
          <td>{{ $thread->user_id }}</td>
          <td>{{ $thread->channel_id }}</td>
          <td>{{ $thread->replies_count }}</td>
          <td>{{ $thread->title }}</td>
          <td>{{ $thread->body }}</td>
          <td>{{ $thread->best_reply_id }}</td>
          <td>{{ $thread->locked }}</td>
        </tr>
        @endforeach
        @else
        <tr>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
        </tr>
      </tbody>
      @endif
    </table>
  </div>
</body>

</html>