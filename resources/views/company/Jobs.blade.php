@extends('layout.menu')
@section('content')







    <div class="container-md">
        <div>
            <h1>Joburi</h1>
            <h2>{{ $companyname }}</h2>


            @foreach ($companyjobs as $job)


                <div>
                    <h2>{{ $job->job_name }}</h2>
                    <p>{{ Str::limit($job->job_description, 50) }}</p>




                    <a href="{{ url('/jobs/' . $job->id) }}" class="btn btn-xs btn-primary pull-right">Vizualizeaza</a>

                </div>
            @endforeach
        </div>
        <div class="row align-items-start">
            <div class="col">column 1</div>
            <div class="col">
                <div class="row align-items-start">
                    <div class="module job-result ">
                        <div class="module-content">
                            <div class="job-result-toggle" style="display: block;">
                                <span class="not-for-me">Not for me</span>
                            </div>
                            <div class="job-result-logo-title">
                                <div class="job-result-logo">
                                    <a href="/Recruiters/Executive-Connections-Ltd-Principal-Connections-949.aspx"><img
                                            alt="Executive Connections Ltd  Principal Connections Ltd"
                                            src="https://irishjobs-web-prd.s3.eu-west-1.amazonaws.com/assets/employer-logos/949-small.gif?X-Amz-Expires=86400&amp;X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIA3UBW7IFPIFTBQVKM/20210307/eu-west-1/s3/aws4_request&amp;X-Amz-Date=20210307T163039Z&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=29af237a711259ca87cd48a27373b436e9c8904d01463014f36903dde65081da"></a>
                                </div>
                                <div class="job-result-title">

                                    <h2 itemprop="title">
                                        <a jobid="8565669" href="/Jobs/Digital-Marketing-Executive-8565669.aspx">Digital
                                            Marketing Executive</a>
                                    </h2>
                                    <h3 itemprop="name">
                                        <a itemprop="hiringOrganization" itemscope=""
                                            itemtype="https://schema.org/Organization"
                                            href="/Recruiters/Executive-Connections-Ltd-Principal-Connections-949.aspx">Executive
                                            Connections Ltd Principal Connections Ltd</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="job-result-overview" style="display: ">
                                <ul class="job-overview">
                                    <li itemprop="baseSalary" class="salary">Not disclosed</li>
                                    <li itemprop="datePosted" class="updated-time">Updated 06/03/2021</li>
                                    <li itemprop="jobLocation" class="location">
                                        <a href="/Jobs/Dublin/">Dublin</a>
                                    </li>
                                </ul>
                            </div>
                            <p itemprop="description" style="display: ">
                                <span>My client is looking for passionate, consumer focused and creative <strong>digital
                                        marketer</strong> to join their growing Global Marketing team. A fantastic
                                    opportunity
                                    for a creative <strong>digital</strong> native who is passionate about all things
                                    consumer
                                    focused to join a Global Irish Brand.</span>
                            </p>
                            <div class="job-result-cta" style="display: ">
                                <button class="btn btn-light"><a href="/Jobs/Digital-Marketing-Executive-8565669.aspx" >Save This Job </a></button>
                                <button class="btn btn-primary"><a href="/Jobs/Digital-Marketing-Executive-8565669.aspx">Show
                                        More</a></button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
