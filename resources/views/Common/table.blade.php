<table class="table table-bordered border-dark h-25">
    <thead class="t-head">
        <tr id="table-heading{{ $id }}">
        </tr>
    </thead>
    <tbody>
        <tr id="row1{{ $id }}">
            <th scope="row" class="serial-number">1</th>
        </tr>
        <tr id="row2{{ $id }}">
            <th scope="row" class="serial-number">2</th>
        </tr>
        <tr id="row3{{ $id }}">
            <th scope="row" class="serial-number">3</th>
        </tr>
    </tbody>
</table>
<script>

    if (`{{ $color }}`=='true') {
        trcontent(`{{ $id }}`,`{{ $start }}`,`{{ $end }}`)
        updateTableContaint(`{{ $Tabledata }}`, `{{ $id }}`, true, `{{ $start }}`,`{{ $end }}`)
    }
</script>
