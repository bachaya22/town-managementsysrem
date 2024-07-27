@extends('superadmin.layout.index1')
@section('content')

<h1>Installment Reminder</h1>
<p>Dear {{ $installment->booking->customer->name }},</p>
<p>This is a reminder that your installment is due on {{ $installment->due_date }}.</p>
<p>Please make sure to complete your payment by the due date to avoid any penalties.</p>
<p>Thank you!</p>

@endsection


