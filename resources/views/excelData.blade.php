<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Headers</title>
</head>
<body>
    <form action="{{ route('merge-excel') }}" method="POST">
        @csrf
        <table>
            <thead>
                <tr>
                    @foreach($templateHeaders as $templateHeader)
                        <th>{{ $templateHeader }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($templateHeaders as $templateHeader)
                        <td>
                            <select name="headerMappings[{{ $templateHeader }}][]" multiple>
                                @foreach($headers as $fileName => $fileHeaders)
                                    <optgroup label="{{ $fileName }}">
                                        @foreach($fileHeaders as $header)
                                            <option value="{{ $header }}">{{ $header }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <button type="submit">Map Headers</button>
    </form>
</body>
</html>




{{-- template --}}

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Headers</title>
</head>

<body>
    <form action="{{ route('generate-excel') }}" method="POST">
        @csrf
        @foreach($templateHeaders as $templateHeader)
        <label for="headerMappings[{{ $templateHeader }}]">{{ $templateHeader }}</label>
        <select name="headerMappings[{{ $templateHeader }}][]" multiple size="5" placeholder="Hold Ctrl to select multiple">
            @foreach($headers as $fileName => $fileHeaders)
                <optgroup label="{{ $fileName }}">
                    @foreach($fileHeaders as $header)
                        <option value="{{ $header }}">{{ $header }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
        <small>Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.</small>
        <br>
    @endforeach
    

        <button type="submit">Map Headers</button>
    </form>
</body>

</html> --}}
