FORMAT: 1A
HOST: https://api.edufocal.com

# EduFocal API

This is documentation for the EduFocal API that allows you to integrate your applications with EduFocal data using REST.

## Authorizaton

This has not been implemented yet, but will be included in a future version closer to rollout date.

# Questions
Search and manage questions

## Questions list [/questions{?topic}{&teacher}{&subject}]

### Get questions [GET]
Find questions by topic, teacher or subject

+ Parameters
    
    + topic (optional, number, `12`) ... find questions under this topic
    + subject (optional, number, `8`) ... find questions under this subject 
    + teacher (optoinal, number, `5`) ... find questions belonging to this teacher

+ Response 200 (application/json)

        {
            "data": [
            {
                "id": "652",
                    "instruction": "<p>The equation of the line <em>k </em>is <em>y=5x+6</em></p>",
                    "body": "<p>What is the gradient of any line parallel to <em>k, </em>where k is the line y=4x+2.</p>",
                    "choices": "{\"1\":\"<p>5<\\/p>\",\"2\":\"<p>6<\\/p>\",\"3\":\"<p>4<\\/p>\",\"4\":\"<p>-5<\\/p>\"}",
                    "answer": "3",
                    "parts": "2",
                    "questions": {
                        "data": [
                        {
                            "id": "653",
                            "instruction": "",
                            "body": "<p>The equation of the line parallel to <em>k </em>that passes through the point (3, -7)</p>",
                            "choices": "{\"1\":\"<p>-7<\\/p>\",\"2\":\"<p>5<\\/p>\",\"3\":\"<p>-22<\\/p>\",\"4\":\"<p>3<\\/p>\"}",
                            "answer": "3",
                            "parts": "1"
                        }
                        ]
                    },
                    "topic": {
                        "data": {
                            "id": "8",
                            "name": "Functions and Graphs"
                        }
                    }
            },
            {
                "id": "662",
                "instruction": "<p>175 persons visited 3 different countries Jamaica, England and China. 120 visited Jamaica, 115 visited England and 50 visited China, 30 visited both Jamaica and England, 15 visited both England and China, 25 visited both Jamaica and China and <em>x </em>visited all 3 countries </p>",
                "body": "<p>Given that A= {natural numbers} and B ={prime numbers between 10 and 20}, given <img src=\"http://latex.codecogs.com/gif.latex?n(A\\cup&space;B)\" align=\"absmiddle\" alt=\"\" /> </p>",
                "choices": "{\"1\":\"<p>0<\\/p>\",\"2\":\"<p>4<\\/p>\",\"3\":\"<p>3<\\/p>\",\"4\":\"<p>2<\\/p>\"}",
                "answer": "2",
                "parts": "3",
                "questions": {
                    "data": [
                    {
                        "id": "663",
                        "instruction": "",
                        "body": "<p>What is the value of x?</p>",
                        "choices": "{\"1\":\"<p>50<\\/p>\",\"2\":\"<p>60<\\/p>\",\"3\":\"<p>30<\\/p>\",\"4\":\"<p>35<\\/p>\"}",
                        "answer": "3",
                        "parts": "1"
                    },
                    {
                        "id": "664",
                        "instruction": "",
                        "body": "<p>Which of the following set is defined by {<em>x</em>∈Z:-3≤<em>x</em>≤6}?</p>",
                        "choices": "{\"1\":\"<p>{-1,0,2,3,4,5,6}<\\/p>\",\"2\":\"<p><span>{0,1,2,5<\\/span><\\/p>\",\"3\":\"<p>{-2,-1,0,1,2,3<\\/p>\",\"4\":\"<p>{-3,-2,-1,0,1,2,3,4,5,6}<\\/p>\"}",
                        "answer": "4",
                        "parts": "1"
                    }
                    ]
                },
                "topic": {
                    "data": {
                        "id": "4",
                        "name": "Sets"
                    }
                }
            }
            ]
        }
