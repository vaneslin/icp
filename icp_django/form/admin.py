from django.contrib import admin

# Register your models here.
from .models import NumberAnswer,TextAnswer, Question, Form, Page


admin.site.register(Question)
admin.site.register(Page)
admin.site.register(Form)
admin.site.register(NumberAnswer)
admin.site.register(TextAnswer)