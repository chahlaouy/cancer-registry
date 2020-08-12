
import axios from 'axios'

export default ({
    namespaced: true,
    state: {
        token: null,
        user: null
    },
    getters: {
        isAuthenticated(state){
            return state.token && state.user
        },
        user(state){
            return state.user
        }
    },
    mutations: {
        SET_TOKEN(state, token){
            state.token = token
        },
        SET_USER(state, user){
            state.user = user
        }
    },
    actions:{
        async logIn({ dispatch }, credentials){
            let response =await axios.post('api/auth/connexion', credentials)
            
            return dispatch('attempt', response.data.token)
        },

        async attempt({ commit, state }, token){
            
            if(token){

                commit('SET_TOKEN', token)
            }
            if (!state.token) {
                return
            }
            try {
                let response =await axios.get('api/auth/main')
                commit('SET_USER', response.data)
            } catch (error) {
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
            }
        },
        logout({ commit }){
            return axios.post('api/auth/deconnexion').then(() => {
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
            }) 
        }
    }
})