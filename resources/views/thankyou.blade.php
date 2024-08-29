@extends('layouts.master')
@section('content')
<style>

body{
    color:#424553 !important;
}

.disabled-link {
   pointer-events: none;
   }
   .page-content2 {
    font-size: 14px;
    background-color: #f1f3f6;
    color: #212121;
    line-height: 1.4;
    padding-bottom: 80px;
}
.desktop-base-cardLayout {
    max-width: 980px;
    margin: 0 auto;
}
.desktop-base-cardContainer {
    width: 100%;
    margin: 70px auto;
    display: inline-block;
    border: 1px solid #d4d5d9;
    border-radius: 8px;
    background: #fff;
    box-shadow: 0 2px 15px rgba(0,0,0,.1);
}
.desktop-base-cardLayout {
    max-width: 980px;
    margin: 0 auto;
}
.desktop-base-confirmationCardContainer {
    padding-bottom: 48px;
    padding-top: 16px;
}
.desktop-base-confirmationCard {
    max-width: 60%;
    margin-bottom: 16px !important;
    border: 1px solid #e9e9eb;
    border-radius: 4px;
    padding:20px;
    margin:auto;
}
.cardComponents-base-desktopStatusCardContainer {
    padding-top: 48px;
    padding-bottom: 48px;
}
.cardComponents-base-statusCardContainer {
    padding: 16px;
    text-align: center;
}
svg:not(:root) {
    overflow: hidden;
}
.cardComponents-base-confirmTick {
    fill: #03a685;
    width: 46px;
    height: 46px;
    margin-bottom: 16px;
}
.cardComponents-base-desktopStatusCardHeading {
    font-size: 32px;
}
.cardComponents-base-statusCardHeading {
  
    font-weight: 700;
    margin-bottom: 12px;
}
.cardComponents-base-statusSuccessHeading {
    color: #03a685;
}
.cardComponents-base-statusCardDesc {
    font-size: 14px;
    color: #282c3f;
}
.cardComponents-base-deliveryContainer {
    padding: 16px;
}
.cardComponents-base-desktopSubCardContainer {
    border: 1px solid #eaeaec;
    border-radius: 4px;
    text-align: left;
    padding: 24px 16px;
    width: 40%;
    margin-bottom: 16px;
}
.cardComponents-base-deliveryTopSection {
    display: flex;
}
.cardComponents-base-deliveryInfo {
    width: calc(100% - 99px);
    text-align: left;
}
.cardComponents-base-deliverHeader {
    font-weight: 700;
    margin-top: 8px;
    text-transform: capitalize;
    display: flex;
    align-items: center;
    white-space: pre;
    max-width: 100%;
}
.cardComponents-base-deliverAddress {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
    text-transform: capitalize;
    font-size:13px;
}
.cardComponents-base-orderDetailsButton {
    border: 1px solid #17c6aa;
    color: #17c6aa;
    padding: 6.5px 12px;
    display: flex;
    align-items: center;
    width: 140px;
    justify-content: space-between;
    border-radius: 4px;
    margin: 16px 0;
    font-weight: 700;
    font-size: 12px;
}
.cardComponents-base-orderDetailsIcon {
    height: 78px;
}
.cardComponents-base-iconRight {
    height: 10px;
    fill: #17c6aa;
}
.cardComponents-base-deliverHeader{
    
     color:#424553;
}
.cardComponents-base-deliverName {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: calc(100% - 100px);
    color:#424553;
}
.cardComponents-base-successCTAContainerDesktop {
    margin: 32px auto 0;
    justify-content: space-between;
    max-width: 60%;
}
.inlineButtonV3-base-container {
    display: flex;
    justify-content: space-between;
}
.inlineButtonV3-base-secondary {
    background-color: #fff !important; 
    border-color: #d4d5d9 !important;
} 
.inlineButtonV3-base-secondary a{
    
    color: #282c3f !important;
    
}
.inlineButtonV3-base-button {
    border: 1px solid;
    border-radius: 4px;
    padding: 12px 14px;
    min-width: 48%;
}
.button-base-button a{
    color:#fff;
}
.button-base-button {
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    padding: 10px;
    background: #17c6aa;
    cursor: pointer;
    text-align: center;
    border: none;
    border-radius: 2px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.cardComponents-base-primaryCTAButton {
    width: 45%;
}
.inlineButtonV3-base-button {
    border: 1px solid;
    border-radius: 4px;
    padding: 12px 14px;
    min-width: 48%;
}
</style>
<div class="success"> </div>
<div class="page-content page-content2">
   <div class="holder">
      <div class="container">
          <div class="desktop-base-cardLayout ">
          <div class="row desktop-base-cardContainer" >
              <div class="desktop-base-cardLayout">
                 <div class="desktop-base-confirmationCardContainer">
                     <div class="desktop-base-confirmationCard">
                         <div class="cardComponents-base-desktopStatusCardContainer cardComponents-base-statusCardContainer"> 
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="cardComponents-base-confirmTick">
                             <path fill-rule="nonzero" d="M7.59 0l1.195 1.72 1.72-1.104.465 2.06 2.005-.34-.325 2.103 1.964.488-1.053 1.805L15.2 7.985l-1.64 1.253 1.053 1.806-1.964.488.325 2.102-2.005-.34-.465 2.06-1.72-1.104-1.194 1.7-1.194-1.72-1.721 1.103-.466-2.038-2.003.34.323-2.103-1.963-.488 1.052-1.806L0 7.985l1.64-1.253L.566 4.927 2.53 4.44l-.323-2.102 2.003.339.466-2.06 1.72 1.104L7.591 0zm1.768 6.12L6.687 9.007a.045.045 0 0 1-.067 0L5.64 7.955a.358.358 0 0 0-.53 0 .417.417 0 0 0 0 .564l1.283 1.37c.07.075.165.112.265.112h.002c.1 0 .195-.039.265-.115l2.97-3.208a.417.417 0 0 0-.007-.563.358.358 0 0 0-.529.006z"></path>
                         </svg>
                         <div class="cardComponents-base-statusCardHeading cardComponents-base-desktopStatusCardHeading cardComponents-base-statusSuccessHeading">Order confirmed</div>
                         <div class="cardComponents-base-statusCardDesc cardComponents-base-desktopStatusCardDesc">Your order is confirmed. You will receive an order confirmation email/SMS shortly with the expected delivery date for your items.</div>
                         </div>
                     </div>
                     
                     <div class="desktop-base-confirmationCard cardComponents-base-deliveryContainer">
                         <div class="cardComponents-base-deliveryTopSection">
                         <div class="cardComponents-base-deliveryInfo">Delivering to:
                             <div class="cardComponents-base-deliverHeader">
                                <div class="cardComponents-base-deliverName">@if(!empty($order)){{ $order->user->first_name}} {{ $order->user->last_name}}@endif</div>
                                <div> | #@if(!empty($order)){{ $order->id}}@endif</div>
                             </div>
                          <div class="cardComponents-base-deliverAddress">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </div><a class="cardComponents-base-orderDetailsButton" href="javascript:;">ORDER DETAILS 
                           <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" class="cardComponents-base-iconRight"><path fill-rule="evenodd" d="M6.797 5.529a.824.824 0 0 0-.042-.036L1.19.193a.724.724 0 0 0-.986 0 .643.643 0 0 0 0 .94L5.316 6 .203 10.868a.643.643 0 0 0 0 .938.724.724 0 0 0 .986 0l5.566-5.299a.644.644 0 0 0 .041-.978"></path></svg></a></div><img class="cardComponents-base-orderDetailsIcon" src="https://constant.myntassets.com/checkout/assets/img/delhiveryPerson_17-03-2021.png">
                           </div>
                 </div>
                 <div class="inlineButtonV3-base-container cardComponents-base-successCTAContainerDesktop">
                     <div data-testid="button" class="button-base-button inlineButtonV3-base-button inlineButtonV3-base-secondary  "><a href="{{route('category.index')}}">CONTINUE SHOPPING</a></div>
                     <div data-testid="button" class="button-base-button inlineButtonV3-base-button  cardComponents-base-primaryCTAButton "><a href="{{route('account-history.index')}}">VIEW ORDER</a></div>
                </div>
              </div>
          </div>
         </div>
      </div>
   </div>
</div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection