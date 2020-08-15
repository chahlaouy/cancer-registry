<template>
<div class="wrapper">

	<nav class="main-header navbar navbar-expand navbar-white navbar-light">


		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
			</li>

		</ul>

	</nav>



	<aside class="main-sidebar sidebar-dark-primary elevation-4">

		<a href="/" class="brand-link">

			<span class="brand-text font-weight-light">Cancer Registry</span>
		</a>

		<div class="sidebar">

			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				
				<div class="info">
					<a href="/" class="d-block">
					{{user.name}}
					</a>
				</div>
			</div>

			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

					<li class="nav-item">
						<router-link to="/" class="nav-link">
							<i class="nav-icon fas fa-th"></i>
							<p>
							Dashboard
							</p>
						</router-link>
					</li>


					<li class="nav-item"> 
						<router-link to="liste-patients" class="nav-link ">
							<i class="fas fa-folder-plus nav-icon"></i>
							<p>créer un enregistrement</p>
						</router-link>
					</li>
					<li class="nav-item"> 
						<router-link to="patients" class="nav-link ">
							<i class="fas fa-pen-square nav-icon"></i>
							<p>Feuilleter/Éditer</p>
						</router-link>
					</li>
					<li class="nav-item"> 
						<router-link to="users" class="nav-link ">
							<i class="fas fa-user-plus nav-icon"></i>
							<p>Ajouter un utilisateur</p>
						</router-link>
					</li>



					<li class="nav-item">
						<router-link to="/profile" class="nav-link">
							<i class="nav-icon fas fa-user"></i>
							<p>
								Profile
							</p>
						</router-link>
					</li>


					<li class="nav-item">
						<div class="nav-link" @click="logout">
							<i class="nav-icon fas fa-power-off"></i>
							<p>Deconnexion</p>
						</div>

					</li>



				</ul>
			</nav>

		</div>

	</aside>


	<div class="content-wrapper">

		<div class="content-header">
			<div class="container-fluid">
			<router-view />
			</div>
		</div>

	</div>

	<footer class="main-footer">

		<div class="float-right d-none d-sm-inline">

		</div>

		<strong>Copyright &copy; 2020-2021 ABDELMOULA basma</strong> All rights reserved.
	</footer>

</div>
</template>



<script>
// import M from 'materialize-css'
import { mapGetters, mapActions } from 'vuex'

export default {
  name: 'MainLayout',
  components: {
    
  },
  computed: {

    ...mapGetters({
      user: 'auth/user',
      isAuthenticated: 'auth/isAuthenticated'
    })
  },
  methods: {
	  ...mapActions({
		  logoutAction: 'auth/logout'
	  }),
	  logout(){
		  this.logoutAction().then(() => {
			  this.$router.push({
				  name: 'connexion'
			  })
		  })
	  }
  },
  mounted(){
	//   M.AutoInit()
  }

}
</script>