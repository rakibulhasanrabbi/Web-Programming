import { useState } from 'react';
import { 
  Search, 
  Calendar, 
  Video, 
  GraduationCap, 
  Users, 
  Globe, 
  ArrowRight, 
  Instagram, 
  Linkedin, 
  Facebook, 
  Youtube,
  MessageCircle,
  X,
  ChevronDown,
  MapPin,
  CheckCircle2
} from 'lucide-react';
import { motion } from 'motion/react';

const categories = [
  "All Events",
  "Application Process",
  "Loans & Visa Process",
  "City Meetups",
  "Basics of Study Abroad",
  "Test & Preparation"
];

const events = [
  {
    id: 1,
    image: "https://picsum.photos/seed/loan/800/450",
    tag: "Loans & Visa Process",
    title: "Global headlines making you second-guess your plans? Let's talk about what really matters.",
    date: "27th April, 2026 | 07:00 PM - 08:00 PM IST",
    type: "Online Event/webinar",
    level: "Bachelor/Masters only",
    color: "bg-primary"
  },
  {
    id: 2,
    image: "https://picsum.photos/seed/univ/800/450",
    tag: "Postgraduate Work Permit",
    title: "Free Application Zone: Top Universities with Application Fee Waivers",
    date: "23rd May, 2026 | 07:00 PM - 08:00 PM IST",
    type: "Online Event/webinar",
    level: "Bachelor/Masters only",
    color: "bg-secondary"
  },
  {
    id: 3,
    image: "https://picsum.photos/seed/research/800/450",
    tag: "Research Opportunities",
    title: "Parameters of Shortlisting - How to Shortlist Universities",
    date: "13th June, 2026 | 07:00 PM - 08:00 PM IST",
    type: "Online Event/webinar",
    level: "Bachelor/Masters only",
    color: "bg-secondary"
  },
  {
    id: 4,
    image: "https://picsum.photos/seed/shortlist/800/450",
    tag: "Research Opportunities",
    title: "Parameters of Shortlisting - How to Shortlist Universities",
    date: "16th Aug, 2026 | 07:00 PM - 08:00 PM IST",
    type: "Online Event/webinar",
    level: "Bachelor/Masters only",
    color: "bg-secondary"
  }
];

export default function App() {
  const [activeCategory, setActiveCategory] = useState("All Events");
  const [selectedEvent, setSelectedEvent] = useState<typeof events[0] | null>(null);

  if (selectedEvent) {
    return (
      <div className="min-h-screen flex flex-col">
        {/* Header */}
        <header className="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
          <div className="max-w-7xl mx-auto px-4 h-20 flex items-center justify-between">
            <div className="flex items-center gap-8">
              <button onClick={() => setSelectedEvent(null)} className="flex items-center gap-2 cursor-pointer">
                <div className="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                  <Globe className="text-white w-6 h-6" />
                </div>
                <span className="text-2xl font-bold tracking-tight text-primary">Abrovia</span>
              </button>
              <nav className="hidden lg:flex items-center gap-6">
                {['Home', 'Programs', 'Test & Prep', 'Scholarships', 'Visa & Guidance', 'AI Tools(Free)'].map((item) => (
                  <button key={item} className="text-sm font-medium text-gray-600 hover:text-primary flex items-center gap-1">
                    {item} <ChevronDown className="w-4 h-4" />
                  </button>
                ))}
              </nav>
            </div>
            <div className="flex items-center gap-6">
              <button className="text-sm font-medium text-primary hover:underline hidden md:block">Ask Our Experts</button>
              <button className="btn-primary">
                Apply Now <ArrowRight className="w-4 h-4" />
              </button>
            </div>
          </div>
        </header>

        <main className="flex-grow max-w-7xl mx-auto px-4 py-8 w-full">
          {/* Event Banner */}
          <div className="relative rounded-3xl overflow-hidden mb-12 aspect-[21/9]">
            <img 
              src={selectedEvent.image} 
              alt={selectedEvent.title} 
              className="w-full h-full object-cover"
              referrerPolicy="no-referrer"
            />
            <div className="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent flex flex-col justify-center p-8 md:p-16">
              <div className="inline-block bg-accent text-primary text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest mb-4 w-fit">
                {selectedEvent.tag}
              </div>
              <h1 className="text-3xl md:text-5xl font-bold text-white max-w-2xl mb-6">
                {selectedEvent.title}
              </h1>
              <div className="flex flex-wrap gap-6 text-white/90 text-sm">
                <div className="flex items-center gap-2"><Calendar className="w-4 h-4" /> {selectedEvent.date}</div>
                <div className="flex items-center gap-2"><Video className="w-4 h-4" /> {selectedEvent.type}</div>
                <div className="flex items-center gap-2"><GraduationCap className="w-4 h-4" /> {selectedEvent.level}</div>
              </div>
            </div>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {/* Left Column: Content */}
            <div className="lg:col-span-2 space-y-10">
              <section className="prose prose-gray max-w-none">
                <p className="text-gray-600 leading-relaxed">
                  You're not alone — and you're not without options. <br /><br />
                  From visa worries to funding gaps and confusing news (yes, even Trump's latest comment), we know how overwhelming the journey can feel. <br /><br />
                  That's why Loan Mela — June Edition is here.
                </p>

                <div className="mt-10 p-6 bg-orange-50 rounded-2xl border border-orange-100">
                  <h3 className="text-lg font-bold text-orange-800 flex items-center gap-2 mb-4">
                    🔥 Hot Topic: Trump's Statement on Foreign Students
                  </h3>
                  <p className="text-orange-700 text-sm leading-relaxed">
                    Former U.S. President Donald Trump recently suggested blocking foreign students from top universities like Harvard, causing concern among aspiring international students.
                  </p>
                </div>

                <div className="mt-10 space-y-8">
                  <div>
                    <h3 className="text-xl font-bold mb-4">What does this mean for you?</h3>
                    <p className="text-gray-600">Is your visa at risk? Will it affect your education loan or future plans?</p>
                  </div>

                  <div>
                    <h3 className="text-xl font-bold mb-4">🧠 What You'll Learn:</h3>
                    <div className="space-y-6">
                      <div className="flex gap-4">
                        <div className="w-10 h-10 shrink-0 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                          <Search className="w-5 h-5" />
                        </div>
                        <div>
                          <h4 className="font-bold">Bank & Lender Comparison</h4>
                          <p className="text-sm text-gray-500">Compare top providers: interest rates, processing fees, repayment terms.</p>
                        </div>
                      </div>
                      <div className="flex gap-4">
                        <div className="w-10 h-10 shrink-0 bg-green-50 rounded-lg flex items-center justify-center text-green-600">
                          <ArrowRight className="w-5 h-5" />
                        </div>
                        <div>
                          <h4 className="font-bold">Loan Eligibility & Sanction Tips</h4>
                          <p className="text-sm text-gray-500">Boost your sanction chances, check university-level eligibility, and more.</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div className="p-8 bg-primary/5 rounded-3xl border border-primary/10">
                    <h3 className="text-xl font-bold mb-6 flex items-center gap-2">
                      🎁 Loan Bonanza: Exclusive Offers & Prizes!
                    </h3>
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                      {[
                        { prize: "Diamond Prize", value: "₹1,00,000", color: "text-blue-500" },
                        { prize: "Platinum Prize", value: "₹50,000", color: "text-gray-400" },
                        { prize: "Gold Prize", value: "₹20,000", color: "text-yellow-500" },
                        { prize: "Silver Prize", value: "₹10,000", color: "text-gray-300" }
                      ].map((p, i) => (
                        <div key={i} className="bg-white p-4 rounded-xl border border-gray-100 flex justify-between items-center">
                          <span className="text-sm font-medium">{p.prize}</span>
                          <span className={`font-bold ${p.color}`}>{p.value}</span>
                        </div>
                      ))}
                    </div>
                  </div>
                </div>
              </section>
            </div>

            {/* Right Column: Sidebar */}
            <div className="space-y-8">
              <div className="glass-card p-8 text-center sticky top-28">
                <div className="flex justify-center gap-2 mb-6">
                  <span className="text-2xl">🇬🇧</span>
                  <span className="text-2xl">🇨🇦</span>
                  <span className="text-2xl">🇺🇸</span>
                </div>
                <h3 className="text-2xl font-bold mb-4">Book Your Seat Now!</h3>
                <p className="text-sm text-gray-500 mb-8">
                  Secure your spot for this exclusive career opportunity session
                </p>
                <button className="w-full py-4 bg-black text-white rounded-xl font-bold hover:bg-gray-800 transition-colors">
                  Select a Country
                </button>
              </div>

              <div className="bg-primary rounded-3xl p-8 text-white relative overflow-hidden">
                <div className="relative z-10">
                  <div className="flex items-center gap-2 mb-4">
                    <div className="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                      <Globe className="w-5 h-5" />
                    </div>
                    <span className="text-xs font-bold uppercase tracking-widest">AI Profile Evaluation</span>
                  </div>
                  <h3 className="text-xl font-bold mb-4">Let AI Evaluate Your Study Profile in Seconds</h3>
                  <p className="text-sm text-white/70 mb-8">
                    Join 25,000+ students who have successfully explored their study options in France with expert guidance.
                  </p>
                  <button className="w-full py-3 bg-white text-primary rounded-xl font-bold hover:bg-gray-100 transition-colors">
                    Evaluate My Profile Instantly
                  </button>
                </div>
                <div className="absolute bottom-[-20px] right-[-20px] opacity-20">
                  <Users className="w-32 h-32" />
                </div>
              </div>
            </div>
          </div>
        </main>

        {/* Footer */}
        <footer className="bg-gray-50 pt-20 pb-10 px-4 border-t border-gray-200">
          <div className="max-w-7xl mx-auto">
            <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12 mb-16">
              <div>
                <h4 className="font-bold mb-6">COMPANY</h4>
                <ul className="space-y-3 text-sm text-gray-500">
                  <li><a href="#" className="hover:text-primary">About Us</a></li>
                  <li><a href="#" className="hover:text-primary">Privacy Policy</a></li>
                  <li><a href="#" className="hover:text-primary">Refund Policy</a></li>
                  <li><a href="#" className="hover:text-primary">Terms And Conditions</a></li>
                  <li><a href="#" className="hover:text-primary">Blogs</a></li>
                  <li><a href="#" className="hover:text-primary">Events</a></li>
                </ul>
              </div>
              <div>
                <h4 className="font-bold mb-6">Study Abroad</h4>
                <ul className="space-y-3 text-sm text-gray-500">
                  <li><a href="#" className="hover:text-primary">International Education Counselling</a></li>
                  <li><a href="#" className="hover:text-primary">Health Insurance For Students</a></li>
                  <li><a href="#" className="hover:text-primary">Accommodation Support</a></li>
                  <li><a href="#" className="hover:text-primary">Visa Processing Guidance</a></li>
                  <li><a href="#" className="hover:text-primary">University Application Support</a></li>
                  <li><a href="#" className="hover:text-primary">Block Account For Germany</a></li>
                </ul>
              </div>
              <div>
                <h4 className="font-bold mb-6">Student Support</h4>
                <ul className="space-y-3 text-sm text-gray-500">
                  <li><a href="#" className="hover:text-primary">Pre-Departure Orientation</a></li>
                  <li><a href="#" className="hover:text-primary">Scholarships & Funding Guidance</a></li>
                  <li><a href="#" className="hover:text-primary">Education Loan Assistance</a></li>
                </ul>
              </div>
              <div>
                <h4 className="font-bold mb-6">Exams</h4>
                <ul className="space-y-3 text-sm text-gray-500">
                  <li><a href="#" className="hover:text-primary">IELTS</a></li>
                  <li><a href="#" className="hover:text-primary">DET</a></li>
                  <li><a href="#" className="hover:text-primary">PTE</a></li>
                  <li><a href="#" className="hover:text-primary">TOEFL</a></li>
                </ul>
              </div>
              <div>
                <h4 className="font-bold mb-6">Finances</h4>
                <ul className="space-y-3 text-sm text-gray-500">
                  <li><a href="#" className="hover:text-primary">Scholarships For Germany</a></li>
                  <li><a href="#" className="hover:text-primary">Scholarships For France</a></li>
                  <li><a href="#" className="hover:text-primary">Scholarships For Italy</a></li>
                  <li><a href="#" className="hover:text-primary">Scholarships For Denmark</a></li>
                  <li><a href="#" className="hover:text-primary">Scholarships For Poland</a></li>
                  <li><a href="#" className="hover:text-primary">Education Loan Calculator</a></li>
                </ul>
              </div>
            </div>

            <div className="flex flex-col items-center border-t border-gray-200 pt-10">
              <div className="flex items-center gap-2 mb-4">
                <div className="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                  <Globe className="text-white w-5 h-5" />
                </div>
                <span className="text-xl font-bold text-primary">Abrovia</span>
              </div>
              <p className="text-sm text-gray-400 mb-8">Dream. Plan. Travel</p>
              
              <div className="flex items-center gap-4">
                {[Linkedin, Facebook, Instagram, MessageCircle, Youtube, X].map((Icon, i) => (
                  <a key={i} href="#" className="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-primary hover:border-primary transition-all">
                    <Icon className="w-5 h-5" />
                  </a>
                ))}
              </div>
            </div>
          </div>
        </footer>
      </div>
    );
  }

  return (
    <div className="min-h-screen flex flex-col">
      {/* Header */}
      <header className="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div className="max-w-7xl mx-auto px-4 h-20 flex items-center justify-between">
          <div className="flex items-center gap-8">
            <div className="flex items-center gap-2">
              <div className="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                <Globe className="text-white w-6 h-6" />
              </div>
              <span className="text-2xl font-bold tracking-tight text-primary">Abrovia</span>
            </div>
            <nav className="hidden lg:flex items-center gap-6">
              {['Home', 'Programs', 'Test & Prep', 'Scholarships', 'Visa & Guidance', 'AI Tools(Free)'].map((item) => (
                <button key={item} className="text-sm font-medium text-gray-600 hover:text-primary flex items-center gap-1">
                  {item} <ChevronDown className="w-4 h-4" />
                </button>
              ))}
            </nav>
          </div>
          <div className="flex items-center gap-6">
            <button className="text-sm font-medium text-primary hover:underline hidden md:block">Ask Our Experts</button>
            <button className="btn-primary">
              Apply Now <ArrowRight className="w-4 h-4" />
            </button>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="py-16 px-4 bg-white">
        <div className="max-w-4xl mx-auto text-center">
          <span className="text-primary font-semibold text-sm tracking-widest uppercase mb-4 block">Dream • Plan • Travel</span>
          <h1 className="text-4xl md:text-6xl font-bold mb-8 leading-tight">
            Dream Abroad? We Prepare You <br /> Every Step
          </h1>
          <ul className="inline-block text-left space-y-3 text-gray-600 mb-12">
            <li className="flex items-center gap-3">
              <CheckCircle2 className="w-5 h-5 text-primary" /> Plan your journey with study-abroad experts
            </li>
            <li className="flex items-center gap-3">
              <CheckCircle2 className="w-5 h-5 text-primary" /> Learn strategies directly from successful alumni
            </li>
            <li className="flex items-center gap-3">
              <CheckCircle2 className="w-5 h-5 text-primary" /> Find scholarships for top universities abroad
            </li>
            <li className="flex items-center gap-3">
              <CheckCircle2 className="w-5 h-5 text-primary" /> Get step-by-step guidance for visa processes
            </li>
          </ul>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
            <div className="flex items-center gap-4 justify-center">
              <div className="w-12 h-12 bg-accent rounded-xl flex items-center justify-center">
                <Users className="text-primary w-6 h-6" />
              </div>
              <div className="text-left">
                <div className="text-xl font-bold">2.5k+</div>
                <div className="text-xs text-gray-500 uppercase tracking-wider">Total No. of Events</div>
              </div>
            </div>
            <div className="flex items-center gap-4 justify-center">
              <div className="w-12 h-12 bg-accent rounded-xl flex items-center justify-center">
                <Calendar className="text-primary w-6 h-6" />
              </div>
              <div className="text-left">
                <div className="text-xl font-bold">3L+</div>
                <div className="text-xs text-gray-500 uppercase tracking-wider">Registrations</div>
              </div>
            </div>
            <div className="flex items-center gap-4 justify-center">
              <div className="w-12 h-12 bg-accent rounded-xl flex items-center justify-center">
                <GraduationCap className="text-primary w-6 h-6" />
              </div>
              <div className="text-left">
                <div className="text-xl font-bold">200+</div>
                <div className="text-xs text-gray-500 uppercase tracking-wider">Participating Universities</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Categories Section */}
      <section className="py-12 px-4 bg-gray-50/50">
        <div className="max-w-7xl mx-auto">
          <div className="text-center mb-10">
            <h2 className="text-3xl font-bold mb-3">Browse Opportunities By Categories</h2>
            <p className="text-gray-500">Discover tips, guidance, and insights from study-abroad experts.</p>
          </div>

          <div className="flex flex-wrap justify-center gap-3 mb-12">
            {categories.map((cat) => (
              <button
                key={cat}
                onClick={() => setActiveCategory(cat)}
                className={`btn-outline ${activeCategory === cat ? 'bg-primary text-white border-primary' : 'bg-white'}`}
              >
                {cat}
              </button>
            ))}
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {events.map((event) => (
              <motion.div 
                key={event.id}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                onClick={() => setSelectedEvent(event)}
                className="glass-card overflow-hidden group cursor-pointer"
              >
                <div className="relative aspect-video overflow-hidden">
                  <img 
                    src={event.image} 
                    alt={event.title} 
                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    referrerPolicy="no-referrer"
                  />
                  <div className={`absolute top-4 left-4 px-3 py-1 rounded-full text-[10px] font-bold text-white uppercase tracking-widest ${event.color}`}>
                    {event.tag}
                  </div>
                </div>
                <div className="p-6">
                  <div className="text-xs font-semibold text-primary mb-3 uppercase tracking-wider">{event.tag}</div>
                  <h3 className="text-lg font-bold mb-4 line-clamp-2 group-hover:text-primary transition-colors">
                    {event.title}
                  </h3>
                  <div className="space-y-2 text-sm text-gray-500">
                    <div className="flex items-center gap-2">
                      <Calendar className="w-4 h-4" /> {event.date}
                    </div>
                    <div className="flex items-center gap-2">
                      <Video className="w-4 h-4" /> {event.type}
                    </div>
                    <div className="flex items-center gap-2">
                      <GraduationCap className="w-4 h-4" /> {event.level}
                    </div>
                  </div>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Banner */}
      <section className="py-12 px-4">
        <div className="max-w-7xl mx-auto">
          <div className="bg-primary rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
            <div className="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
            <div className="relative z-10">
              <h2 className="text-3xl md:text-4xl font-bold text-white mb-4">Got Questions About Anything?</h2>
              <p className="text-white/80 max-w-xl">
                Reach out to our team—we'll help you register, prep, or pick the right sessions for your goals.
              </p>
            </div>
            <button className="bg-white text-primary px-8 py-4 rounded-xl font-bold hover:bg-gray-100 transition-colors relative z-10">
              Contact Us
            </button>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-50 pt-20 pb-10 px-4 border-t border-gray-200">
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12 mb-16">
            <div>
              <h4 className="font-bold mb-6">COMPANY</h4>
              <ul className="space-y-3 text-sm text-gray-500">
                <li><a href="#" className="hover:text-primary">About Us</a></li>
                <li><a href="#" className="hover:text-primary">Privacy Policy</a></li>
                <li><a href="#" className="hover:text-primary">Refund Policy</a></li>
                <li><a href="#" className="hover:text-primary">Terms And Conditions</a></li>
                <li><a href="#" className="hover:text-primary">Blogs</a></li>
                <li><a href="#" className="hover:text-primary">Events</a></li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold mb-6">Study Abroad</h4>
              <ul className="space-y-3 text-sm text-gray-500">
                <li><a href="#" className="hover:text-primary">International Education Counselling</a></li>
                <li><a href="#" className="hover:text-primary">Health Insurance For Students</a></li>
                <li><a href="#" className="hover:text-primary">Accommodation Support</a></li>
                <li><a href="#" className="hover:text-primary">Visa Processing Guidance</a></li>
                <li><a href="#" className="hover:text-primary">University Application Support</a></li>
                <li><a href="#" className="hover:text-primary">Block Account For Germany</a></li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold mb-6">Student Support</h4>
              <ul className="space-y-3 text-sm text-gray-500">
                <li><a href="#" className="hover:text-primary">Pre-Departure Orientation</a></li>
                <li><a href="#" className="hover:text-primary">Scholarships & Funding Guidance</a></li>
                <li><a href="#" className="hover:text-primary">Education Loan Assistance</a></li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold mb-6">Exams</h4>
              <ul className="space-y-3 text-sm text-gray-500">
                <li><a href="#" className="hover:text-primary">IELTS</a></li>
                <li><a href="#" className="hover:text-primary">DET</a></li>
                <li><a href="#" className="hover:text-primary">PTE</a></li>
                <li><a href="#" className="hover:text-primary">TOEFL</a></li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold mb-6">Finances</h4>
              <ul className="space-y-3 text-sm text-gray-500">
                <li><a href="#" className="hover:text-primary">Scholarships For Germany</a></li>
                <li><a href="#" className="hover:text-primary">Scholarships For France</a></li>
                <li><a href="#" className="hover:text-primary">Scholarships For Italy</a></li>
                <li><a href="#" className="hover:text-primary">Scholarships For Denmark</a></li>
                <li><a href="#" className="hover:text-primary">Scholarships For Poland</a></li>
                <li><a href="#" className="hover:text-primary">Education Loan Calculator</a></li>
              </ul>
            </div>
          </div>

          <div className="flex flex-col items-center border-t border-gray-200 pt-10">
            <div className="flex items-center gap-2 mb-4">
              <div className="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                <Globe className="text-white w-5 h-5" />
              </div>
              <span className="text-xl font-bold text-primary">Abrovia</span>
            </div>
            <p className="text-sm text-gray-400 mb-8">Dream. Plan. Travel</p>
            
            <div className="flex items-center gap-4">
              {[Linkedin, Facebook, Instagram, MessageCircle, Youtube, X].map((Icon, i) => (
                <a key={i} href="#" className="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-400 hover:text-primary hover:border-primary transition-all">
                  <Icon className="w-5 h-5" />
                </a>
              ))}
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}
