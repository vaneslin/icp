from django.urls import path

from . import views

urlpatterns = [
    # ex: /polls/
    path('', views.get_patient_dashboard, name='get_patient_dashboard'),
    # ex: /polls/5/
    path('<int:patient_id>/', views.get_med_clerk_pre_sed, name='get_med_clerk_pre_sed'),
    # ex: /polls/5/results/
    # path('<int:question_id>/results/', views.results, name='results'),
    # ex: /polls/5/vote/
    # path('medclerk/', views.get_med_clerk_pre_sed, name='get_med_clerk_pre_sed'),

]