<!DOCTYPE html>
<html>
<head>
    <title>Deal Contract</title>
</head>
<body>
<img src="/images/deal-logo.png" alt="T2T Logo" style="padding-bottom: 1.5rem"/>
<h1>Car Buyer’s/Seller’s Contract</h1>
<p>Car buyer’s/seller’s contract If you're buying or selling a used car, print two copies out and complete them in front
    of the other party. Both buyer and seller should sign and keep a copy of this document as proof of sale.</p>
<h1>Car Details</h1>

<p>Make: {{ $post->make->name }}</p>
<p>Model : {{ $post->models->name }}</p>
<p>Registration number: {{ $post->regno }}</p>
<p>Mileage: {{ $post->mileage }}</p>

<h1>Description</h1>
<p>The undersigned purchaser acknowledges receipt of the above vehicle in exchange for the cash sum of {{$post->price}},
    this being
    the price agreed by the purchaser with the vendor for the above named vehicle, receipt of which the vendor hereby
    acknowledges. It is understood by the purchaser that the vehicle is sold as seen, tried and approved without
    guarantee.</p>

<p>Purchaser: {{$fromUser->name}}</p>
<p>Vendor: {{$toUser->name}}</p>

<p>Date {{ $date }}</p>
</body>
</html>
