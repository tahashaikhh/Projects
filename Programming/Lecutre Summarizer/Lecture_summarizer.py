#!/Library/Frameworks/Python.framework/Versions/3.10/bin/python3
import speech_recognition
import spacy
from spacy.lang.en.stop_words import STOP_WORDS
from string import punctuation
from heapq import nlargest
from tkinter import *
from tkinter import ttk
from tkinter.scrolledtext import ScrolledText
from turtle import width
import os
import time

root = Tk()
root.title('Summarizer')
root.geometry("1000x1000")
frame = Frame(root)
frame.pack()

def startScreen():
    for widgets in frame.winfo_children():
        widgets.destroy()
    head = Label(frame,text="Summarizer", font=('Helvetica',20))
    head.grid(row=0,column=2)
    global per
    var = StringVar()
    label1 = Label(frame,text="Please select how much you want to summarize the data:")
    label1.grid(row=1,column=2)
    slider = Scale(frame, from_=10, to=100,length=400,tickinterval=10, orient=HORIZONTAL)
    slider.set(50)
    slider.grid(row=2,column=2,pady=10)
    per = slider.get()/100
    label2 = Label(frame,text="Select the type of input you will provide:")
    label2.grid(row=3,column=2,pady=10)
    R1 = Radiobutton(frame, text="Text", variable=var, value="t",command=lambda:refreshTextWindow(slider.get()/100))
    R2 = Radiobutton(frame, text="Audio", variable=var, value="s",command=lambda:refreshAudioWindow(slider.get()/100))
    R1.grid(row=4,column=1,pady=10)
    R2.grid(row=4,column=3,pady=10)

def record_voice():
    global stop_recording

    r = speech_recognition.Recognizer()
    r.pause_threshold =0.8
    try:
        stop_recording = r.listen_in_background(speech_recognition.Microphone(), test)
    except speech_recognition.UnknownValueError:
        pass

def test(recognizer,audio):
    print("In Test")
    file = open('you_said_this.txt', 'a+')
    print("I'm trying to hear you: ")
    phrase = recognizer.recognize_google(audio, language='en')
    file.write(phrase)
    print('the last sentence you spoke was saved in you_said_this.txt')
    file.close()


def summarize(text,per):
    nlp = spacy.load('en_core_web_sm')
    doc= nlp(text)
    tokens=[token.text for token in doc]
    word_frequencies={}
    for word in doc:
        if word.text.lower() not in list(STOP_WORDS):
            if word.text.lower() not in punctuation:
                if word.text not in word_frequencies.keys():
                    word_frequencies[word.text] = 1
                else:
                    word_frequencies[word.text] += 1
    max_frequency=max(word_frequencies.values())
    for word in word_frequencies.keys():
        word_frequencies[word]=word_frequencies[word]/max_frequency
    sentence_tokens= [sent for sent in doc.sents]
    sentence_scores = {}
    for sent in sentence_tokens:
        for word in sent:
            if word.text.lower() in word_frequencies.keys():
                if sent not in sentence_scores.keys():                            
                    sentence_scores[sent]=word_frequencies[word.text.lower()]
                else:
                    sentence_scores[sent]+=word_frequencies[word.text.lower()]
    select_length=int(len(sentence_tokens)*per)
    summary=nlargest(select_length, sentence_scores,key=sentence_scores.get)
    final_summary=[word.text for word in summary]
    summary=''.join(final_summary)
    print("In summarize\n",summary)
    return summary

def getTextField(inputtext,per):
    res = inputtext.get("1.0","end-1c")
    if(inputtext):
        resulttext = summarize(res,per)
        resultScreen(resulttext)

def refreshTextWindow(per):
    '''
        Function to call Text input screen
    '''
    for widgets in frame.winfo_children():
        widgets.destroy()
    label = Label(frame,text="Summarizer", font=('Helvetica',20))
    label.grid(row=0,column=1,pady=5)
    name_label = Label(frame, text = 'Text')
    textfield = ScrolledText(frame,width=60,height=20)
    textfield.grid(row=1,column=1)
    name_label.grid(row=1,column=0)
    sub_button = Button(frame,text='Submit',command=lambda:getTextField(textfield,per),width=10)
    sub_button.grid(row=4,column=1,pady=8)
    menu_button = Button(frame,text='Menu',command=startScreen,width=10)
    menu_button.grid(row=6,column=1,pady=8)

def refreshAudioWindow(per):
    '''
        Function to call Audio input screen
    '''
    for widgets in frame.winfo_children():
        widgets.destroy()
    l = Label(frame,text="Your audio is being recorded")
    l.grid(row=1,column=1,pady=5)
    stop_button = Button(frame,text='Stop ',command=lambda:audio_to_text(per),width=10)
    stop_button.grid(row=2,column=1,pady=10)
    menu_button = Button(frame,text='Menu',command=startScreen,width=10)
    menu_button.grid(row=2,column=2,pady=10)
    record_voice()


def audio_to_text(per):
    stop_recording()
    file = open('you_said_this.txt', 'r')
    text_input = file.read()
    file.close()
    print(text_input+"\n"+str(per)+"\n")
    if text_input:
        text_result = summarize(text_input,per)
        print("Text Result\n"+text_result)
        resultScreen(text_result)
    else:
        text_result = ""
        resultScreen(text_result)

def resultScreen(text_result):
    for widgets in frame.winfo_children():
        widgets.destroy()
    label = Label(frame,text="Results:", font=('Helvetica',20))
    label.grid(row=0,column=1,pady=5)
    if text_result != "" or text_result:
        resultField = ScrolledText(frame,width=60,height=20)
        resultField.grid(row=1,column=1)
        print(text_result)
        resultField.insert('insert',text_result)
    else:
        label = Label(frame,text="Oops! Looks like you haven't provided any input. Please try again", font=('Helvetica',15))
        label.grid(row=0,column=1,pady=5)
    menuButton = Button(frame,text='Menu',command=startScreen,width=10)
    menuButton.grid(row=2,column=1,pady=8)
    if os.path.exists("you_said_this.txt"):
        os.remove("you_said_this.txt")

startScreen()
root.mainloop()