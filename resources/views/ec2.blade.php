<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AutoMate - Deploy Amazon EC2</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<div class="wrapper">
    <div id="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" >AutoMate</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vpc">VPC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ec2">EC2</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">S3</a>
                            <a class="dropdown-item" href="#">RDS</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About AutoMate</a>
                    </li>
                </ul>



                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="history">History</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </nav>


        <body>

        </br></br>










        <!--- text --->

        <h3 style="text-align: center">Deploy an Amazon VPC</h3>

        </br>

        <h3 style="text-align: left">Overview</h3>

        <hr style="color: lightgrey">

        <p style="font-size: 17px; text-align: left">A configuration package to deploy an <b>Amazon VPC</b> with predefined presets to select: Subnet Tiers (Public and Private),
            Availability Zones, and Internet Connectivity. Configuration includes <b>Subnets, Routing Tables, Internet Gateway, Nat Gateways,</b> and <b>Security Groups.</b></p>

        <br/>

        <h3 style="text-align: left">Configure & Deploy</h3>

        <hr style="color: lightgrey">

        <br/>

        <h5 style="text-align: center">Configuration Presets</h5>

        <br/>







        <!--- form --->

        <form class="form-control" style="text-align: left; width: 300px; height: 285px;">

            <label>Subnet Tiers:</label>
            <select class="form-control" name="subnet-tiers" id="subnet-tiers" onchange="printSubnetTiers()">
                <option value="Public-Only">Public-Only</option>
                <option value="Private-Only">Private-Only</option>
                <option value="Public-Private" selected>Public-Private</option>
            </select>


            </br>
            <label>Availability Zones:</label>
            <select class="form-control" name="subnet-tiers" id="subnet-tiers">
                <option value="One">One</option>
                <option value="Two" selected>Two</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
            </select>

            </br>
            <label>Internet Connectivity:</label>
            <select class="form-control" name="subnet-tiers" id="subnet-tiers">
                <option value="None">None</option>
                <option value="IGW-Only" selected>IGW-Only</option>
                <option value="IGW-NAT">IGW-NAT</option>
            </select>

            <!--
            <div>
                <label>Description: <input name="description" id="description" onkeydown="printDescription()"/>
                </label>
            </div>


            <div>
                <label>VPC name: <input name="vpcname" id="vpcname"  onkeydown="printVPCName()"/>
                </label>
            </div>


            <div>
                <label>CIDR Block: <input name="cidrblock" id="cidrblock"  onkeydown="printCIDRBlock()"/>
                </label>
            </div>

            --->

        </form>

        <br/>









        <!--- configuration template --->


        <h5 style="text-align: center">Configuration Template</h5>

        <br/>

        <div class="left">
            other configuration
        </div>

        <div class="right">

<pre>
<span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">AWSTemplateFormatVersion:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">'2010-09-09'</span>
</span>
<span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Description:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);")> <p id="descresult" style="display: inline">''</p></span>
</span>
<span style="white-space:nowrap; color: rgb(25, 144, 184);">
Resources:
</span>
<span>  </span><span style="color: rgb(25, 144, 184);">VPC:</span>
<span>   </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Type:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">'AWS::EC2::VPC'</span>
</span>
<span>   </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Properties:</span>
</span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">CidrBlock:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)"><p id="cidrresult" style="display: inline">10.0.0.0/16</p></span>
</span>
<span>  </span><span style="color: rgb(25, 144, 184);">PublicSubnet1:</span>
<span>   </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Type:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">'AWS::EC2::Subnet'</span>
</span>
<span>   </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Properties:</span></span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">CidrBlock:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)"><p id="cidrresult" style="display: inline">10.0.0.0/24</p></span>
</span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">MapPublicIpOnLaunch:</span>
<span> </span> <span style="color: rgb(238, 153, 0);">false</span>
</span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">VpcId:</span></span>
<span>       </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Ref:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">VPC</span>
    </span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Tags:</span></span>
<span>       </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">- Key:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">Name</span>
    </span>
<span>         </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Value:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)"><p id="vpcnameresult" style="display: inline">Public Subnet AZ A</p></span>
</span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">AvailabilityZone:</span></span>
<span>       </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">'Fn::Select':</span></span>
<span>         </span><span style="white-space:nowrap;">
<span style="color: rgb(color: rgb(95, 99, 100);)">- '0'</span></span>
<span>         </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">- 'Fn::GetAZs':</span></span>
<span>             </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Ref:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">'AWS::Region'</span>
    </span>
<span>  </span><span style="color: rgb(25, 144, 184);">PublicSubnet2:</span>
<span>   </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Type:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">'AWS::EC2::Subnet'</span>
</span>
<span>   </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Properties:</span></span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">CidrBlock:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)"><p id="cidrresult" style="display: inline">10.0.1.0/24</p></span>
</span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">MapPublicIpOnLaunch:</span>
<span> </span> <span style="color: rgb(238, 153, 0);">false</span>
</span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">VpcId:</span></span>
<span>       </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Ref:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">VPC</span>
    </span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Tags:</span></span>
<span>       </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">- Key:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">Name</span>
    </span>
<span>         </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Value:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)"><p id="vpcnameresult" style="display: inline">Public Subnet AZ B</p></span>
</span>
<span>     </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">AvailabilityZone:</span></span>
<span>       </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">'Fn::Select':</span></span>
<span>         </span><span style="white-space:nowrap;">
<span style="color: rgb(color: rgb(95, 99, 100);)">- '1'</span></span>
<span>         </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">- 'Fn::GetAZs':</span></span>
<span>             </span><span style="white-space:nowrap;">
<span style="color: rgb(25, 144, 184);">Ref:</span>
<span> </span> <span style="color: rgb(color: rgb(95, 99, 100);)">'AWS::Region'</span>
    </span>
  <span style="color: rgb(25, 144, 184);">PrivateSubnet1:</span>
    <span style="color: rgb(25, 144, 184);">Type:</span> 'AWS::EC2::Subnet'
    <span style="color: rgb(25, 144, 184);">Properties:</span>
      <span style="color: rgb(25, 144, 184);">CidrBlock:</span> 10.0.10.0/24
      <span style="color: rgb(25, 144, 184);">MapPublicIpOnLaunch:</span> <span style="color: rgb(238, 153, 0);">false</span>
      <span style="color: rgb(25, 144, 184);">VpcId:</span>
        <span style="color: rgb(25, 144, 184);">Ref:</span> <span style="color: rgb(color: rgb(95, 99, 100);)">VPC</span>
      <span style="color: rgb(25, 144, 184);">Tags:</span>
        <span style="color: rgb(25, 144, 184);">- Key:</span> Name
          <span style="color: rgb(25, 144, 184);">Value:</span> Private Subnet AZ A
      <span style="color: rgb(25, 144, 184);">AvailabilityZone:</span>
        <span style="color: rgb(25, 144, 184);">'Fn::Select':</span>
          - '0'
          <span style="color: rgb(25, 144, 184);">- 'Fn::GetAZs':</span>
              <span style="color: rgb(25, 144, 184);">Ref:</span> 'AWS::Region'
  <span style="color: rgb(25, 144, 184);">PrivateSubnet2:</span>
    <span style="color: rgb(25, 144, 184);">Type:</span> 'AWS::EC2::Subnet'
    <span style="color: rgb(25, 144, 184);">Properties:</span>
      <span style="color: rgb(25, 144, 184);">CidrBlock:</span> 10.0.11.0/24
      <span style="color: rgb(25, 144, 184);">MapPublicIpOnLaunch:</span> <span style="color: rgb(238, 153, 0);">false</span>
      <span style="color: rgb(25, 144, 184);">VpcId:</span>
        <span style="color: rgb(25, 144, 184);">Ref:</span> <span style="color: rgb(color: rgb(95, 99, 100);)">VPC</span>
      <span style="color: rgb(25, 144, 184);">Tags:</span>
        <span style="color: rgb(25, 144, 184);">- Key:</span> Name
          <span style="color: rgb(25, 144, 184);">Value:</span> Private Subnet AZ B
      <span style="color: rgb(25, 144, 184);">AvailabilityZone:</span>
        <span style="color: rgb(25, 144, 184);">'Fn::Select':</span>
          - '1'
          <span style="color: rgb(25, 144, 184);">- 'Fn::GetAZs':</span>
              <span style="color: rgb(25, 144, 184);">Ref:</span> 'AWS::Region'
  <span style="color: rgb(25, 144, 184);">RouteTablePublic:</span>
    Type: 'AWS::EC2::RouteTable'
    Properties:
      VpcId:
        Ref: VPC
      Tags:
        - Key: Name
          Value: Public Route Table
  RouteTablePublicAssociation1:
    Type: 'AWS::EC2::SubnetRouteTableAssociation'
    Properties:
      RouteTableId:
        Ref: RouteTablePublic
      SubnetId:
        Ref: PublicSubnet1
  RouteTablePublicAssociation2:
    Type: 'AWS::EC2::SubnetRouteTableAssociation'
    Properties:
      RouteTableId:
        Ref: RouteTablePublic
      SubnetId:
        Ref: PublicSubnet2
  RouteTablePublicRoute0:
    Type: 'AWS::EC2::Route'
    Properties:
      DestinationCidrBlock: 0.0.0.0/0
      RouteTableId:
        Ref: RouteTablePublic
      GatewayId:
        Ref: Igw
  RouteTablePrivate:
    Type: 'AWS::EC2::RouteTable'
    Properties:
      VpcId:
        Ref: VPC
      Tags:
        - Key: Name
          Value: Private Route Table
  RouteTablePrivateAssociation1:
    Type: 'AWS::EC2::SubnetRouteTableAssociation'
    Properties:
      RouteTableId:
        Ref: RouteTablePrivate
      SubnetId:
        Ref: PrivateSubnet1
  RouteTablePrivateAssociation2:
    Type: 'AWS::EC2::SubnetRouteTableAssociation'
    Properties:
      RouteTableId:
        Ref: RouteTablePrivate
      SubnetId:
        Ref: PrivateSubnet2
  Igw:
    Type: 'AWS::EC2::InternetGateway'
    Properties: {}
  IGWAttachment:
    Type: 'AWS::EC2::VPCGatewayAttachment'
    Properties:
      VpcId:
        Ref: VPC
      InternetGatewayId:
        Ref: Igw
Parameters: {}
Metadata: {}
Conditions: {}

</pre>


        </div>









        <script>

            function printDescription() {

                var desc = document.getElementById("description").value;
                document.getElementById("descresult").innerHTML = "'"+desc+"'";

            }

        </script>


        <script>

            function printVPCName() {

                var vname = document.getElementById("vpcname").value;
                document.getElementById("vpcnameresult").innerHTML = vname;

            }

        </script>





        <script>

            function printCIDRBlock() {

                var cidr = document.getElementById("cidrblock").value;
                document.getElementById("cidrresult").innerHTML = cidr;

            }

        </script>


        <script>


            function printSubnetTiers() {

                var x = document.getElementById("subnet-tiers").value;
                document.getElementById("result").innerHTML = " You have selected: " + x;

            }

        </script>








        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        </body>

    </div>
</div>




</html>



