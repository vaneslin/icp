from django.http import HttpResponse
from django.template import loader
from django.shortcuts import render
from .models import Question, TextAnswer, NumberAnswer
from .forms import MedClerkPreSedForm


def index(request):
    questions = Question.objects.all()
    template = loader.get_template('form/index.html')
    context = {'questions': questions}
    return render(request, 'form/index.html', context)


def detail(request, question_id):
    return HttpResponse("You're looking at question %s." % question_id)


def results(request, question_id):
    response = "You're looking at the results of question %s."
    return HttpResponse(response % question_id)


def get_med_clerk_pre_sed(request):
    form = MedClerkPreSedForm()
    return render(request, 'form/medclerk.html', {'form': form})
