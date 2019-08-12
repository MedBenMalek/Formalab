
@extends('administrateur.layouts.default')
@section('title')
Générer factures
@endsection

   @section('styles')
       @include('administrateur.layouts.stylepopup')
         @endsection

 @section('content')


   <section id="middle">


       <!-- page title -->
       <header id="page-header">
         <h1>Générer factures</h1>
         <ol class="breadcrumb">
           <li><a href="/admin">Accueil</a></li>
           <li class="active">Générer factures</li>
         </ol>
       </header>
       <!-- /page title -->


       <div id="content" class="padding-20">

         <!--
           PANEL CLASSES:
             panel-default
             panel-danger
             panel-warning
             panel-info
             panel-success

           INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
               All pannels should have an unique ID or the panel collapse status will not be stored!
         -->
         <div id="panel-1" class="panel panel-default">

         <div align="center" style="margin-bottom: 20px">

         </div>

           <!-- panel content -->
           <div class="panel-body">
             {!! Form::open(['method' => 'GET', 'url' => route('factures.download'), 'class' => 'form', 'id' =>'form']) !!}

             <div class="row">
               <div class="form-group">
                 <div class="col-md-6 col-sm-6">
                   <label>Thème de formation *</label>
                   <select id="" class="form-control categories" name="categories">
                     <option value="0" selected="true" disabled="true">Sélectionner</option>
                             @foreach($categories as $categorie)
                             <option value="{{ $categorie->id_categorie }}" > {{ $categorie->titre_categorie }} </option>
                             @endforeach
                         </select>
                 </div>
                 <div class="col-md-6 col-sm-6">
                   <label>Formation *</label>
                        <select name="id_formation" id="formations" class="form-control formations">
                              <option value="0" disabled="true" selected="true">Sélectionner la formation</option>
                        </select>
                 </div>
               </div>
             </div>

            <div align="center" style="margin-top: 20px; margin-bottom: -20px">
              <button type="submit" name="Enregistrer" class="btn btn-yellow"><i class="fa fa-download"></i>Télécharger les factures</button>
            </div>

             {!! Form::close() !!}

           </div>
           <!-- /panel content -->

         </div>
         <!-- /PANEL -->

       </div>
     </section>
   @endsection
   @section('scripts')
   @include('administrateur.layouts.scriptID01')
   <script>
   $(document).ready(function(){

       $(document).on('change','.categories',function(){

           var cat_id=$(this).val();
           var div=$(this).parent().parent();

           var op=" ";

           $.ajax({
               type:'get',
               url:'{!!URL::to('findFormationName')!!}',
               data:{'id':cat_id},
               success:function(data){

                   op+='<option value="0" selected disabled>Sélectionner la formation</option>';
                   for(var i=0;i<data.length;i++){
                   op+='<option value="'+data[i].id+'">'+data[i].title+'</option>';
                  }

                  div.find('#formations').html(" ");
                  div.find('#formations').append(op);
               },
               error:function(){

               }
           });
       });
       });

   </script>
   @endsection
