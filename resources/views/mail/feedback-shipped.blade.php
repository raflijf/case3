<div>
    <div>
        <p><b>Dari : </b>{{ $email }}</p>
        <ul><b>alasan :</b> 
            @foreach ($reasons as $reason )
                <li>{{ $reason }}</li>
            @endforeach
        </ul>
        <p><b>Kritik & saran :</b>  {{ $suggestions }}</p>
    </div>
</div>