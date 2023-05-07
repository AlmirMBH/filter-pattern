<!DOCTYPE html>
<html>
<head>
	<title>Get Users</title>	
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
          background-color: #E20E78;
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
          background-color: #E20E78;
          color: white;
          text-align: center;
        }
      </style>
</head>
<body>
	<div class="container">
  <form action="{{ route('search-user') }}" method="POST">
    @method('POST')
    @csrf
    
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name', session('userFilterInput.name')) }}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="{{ old('email', session('userFilterInput.email')) }}">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="roleId">Role:</label>
    <input type="number" id="roleId" name="roleId" value="{{ old('roleId', session('userFilterInput.roleId')) }}">
    @error('roleId')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <label for="pagination">Number of Records:</label>
    <input type="number" id="pagination" name="pagination" value="{{ old('pagination', session('userFilterInput.pagination')) }}">
    @error('pagination')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <label for="orderBy">Order By:</label>
    <select id="orderBy" name="orderById">
        <option value="asc" {{ old('orderById', session('userFilterInput.orderById')) === 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ old('orderById', session('userFilterInput.orderById')) === 'desc' ? 'selected' : '' }}>Descending</option>
    </select>
    @error('orderById')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type="submit" value="Get Users">
</form>

	</div>
    <div class="container">        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>                    
                </tr>
            </thead>
            @if (isset($users) && !$errors->any())
              <tbody>
                  @foreach ($users as $user)
                      <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->role_id }}</td>                          
                          </tr>
                      @endforeach              
            @else
                      <tr>
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